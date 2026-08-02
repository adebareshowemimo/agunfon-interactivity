<?php

namespace Tests\Feature;

use Tests\TestCase;

class ModernCommerceRedirectTest extends TestCase
{
    public function test_retired_product_page_redirects_permanently(): void
    {
        $this->get('/plugins/modern-commerce')
            ->assertStatus(301)
            ->assertRedirect('https://moderncommerce.dev');
    }

    public function test_old_documentation_redirects_to_product_documentation(): void
    {
        $this->get('/docs/1.0/modern-commerce/payments')
            ->assertStatus(301)
            ->assertRedirect('https://moderncommerce.dev/docs/1.x/payments');
    }
}
