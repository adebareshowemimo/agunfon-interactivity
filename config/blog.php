<?php

/*
|--------------------------------------------------------------------------
| Blog posts registry (file-based blog)
|--------------------------------------------------------------------------
|
| Source of truth for the Agunfon blog. Each entry is keyed by its URL slug
| and drives: the /blog index card, the /blog/{slug} article page metadata,
| and the Article + BreadcrumbList JSON-LD. Newest post first.
|
| To publish a new post: add an entry here (newest first) and create the
| matching body view at resources/views/blog/posts/<slug>.blade.php.
|
*/

return [

    'compliance-completion-crisis' => [
        'title'    => 'The Compliance Completion Crisis: From Checkbox Training to Auditable Evidence',
        'excerpt'  => 'A green tick is not an audit trail. Here is how to move compliance training from checkbox completion to a defensible evidence chain inside Moodle.',
        'metadesc' => 'Move Moodle compliance training from checkbox completion to an auditable evidence chain with five connected Agunfon plugins. Built for Moodle 4.5–5.2.',
        'date'     => '2026-07-29',
        'author'   => 'Agunfon',
        'readtime' => '9 min read',
        'category' => 'Compliance',
        'image'    => '/images/blog/compliance-completion-crisis/audit-evidence-editorial.png',
        'view'     => 'blog.posts.compliance-completion-crisis',
    ],

];
