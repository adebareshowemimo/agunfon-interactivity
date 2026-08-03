<?php

namespace App\Support;

use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

/**
 * Reads the LaRecipe documentation tree (resources/docs/<version>/**.md) and
 * exposes it as a list of crawlable URLs plus titles.
 *
 * The docs are the deepest, most keyword-rich content on the site, but LaRecipe
 * registers its routes dynamically, so nothing else on the site knows they
 * exist. This class is what lets sitemap.xml and llms.txt enumerate them.
 */
class DocsIndex
{
    /**
     * LaRecipe treats index.md as the sidebar definition, not a page.
     */
    private const NOT_A_PAGE = ['index'];

    /**
     * Every documentation page, grouped by top-level product folder.
     *
     * Root-level pages (overview.md) land under the '' key.
     *
     * @return array<string, array<int, array{url: string, title: string}>>
     */
    public function grouped(): array
    {
        $version = config('larecipe.versions.default', '1.0');
        $root = base_path(trim(config('larecipe.docs.path', '/resources/docs'), '/') . '/' . $version);

        if (! File::isDirectory($root)) {
            return [];
        }

        $groups = [];

        foreach (File::allFiles($root) as $file) {
            if ($file->getExtension() !== 'md') {
                continue;
            }

            // e.g. "modern-video-player/quick-start"
            $slug = str_replace('\\', '/', Str::beforeLast($file->getRelativePathname(), '.md'));

            if (in_array($slug, self::NOT_A_PAGE, true)) {
                continue;
            }

            $group = str_contains($slug, '/') ? Str::before($slug, '/') : '';

            $groups[$group][] = [
                'url' => '/docs/' . $version . '/' . $slug,
                'title' => $this->titleFor($file->getPathname(), $slug),
            ];
        }

        // Root pages first, then products alphabetically; pages alphabetical within each.
        ksort($groups);
        foreach ($groups as &$pages) {
            usort($pages, fn ($a, $b) => strcmp($a['url'], $b['url']));
        }

        return $groups;
    }

    /**
     * Flat list of documentation URLs, for sitemap.xml.
     *
     * @return array<int, string>
     */
    public function urls(): array
    {
        return collect($this->grouped())
            ->flatten(1)
            ->pluck('url')
            ->all();
    }

    /**
     * Prefer the page's own H1; fall back to a humanised slug.
     */
    private function titleFor(string $path, string $slug): string
    {
        $contents = File::get($path);

        if (preg_match('/^\s*#\s+(.+?)\s*$/m', $contents, $m)) {
            return trim($m[1]);
        }

        return Str::headline(Str::afterLast($slug, '/'));
    }
}
