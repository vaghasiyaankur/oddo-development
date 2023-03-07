<?php

namespace Tests\Feature\Admin\Controllers;

use App\Models\Pages;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PagesControllerTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();
        $this->adminLogin();
    }

    /**
     * List Of Pages
     *
     * @return void
     */
    public function test_page_list()
    {
        $pages = Pages::paginate(10);
        $response = $this->get(route('pages.index'));
        $response->assertViewIs('admin::pages.index');
        $response->assertSee($pages);
    }

    /**
     * Page Create
     *
     * @return void
     */
    public function test_page_create()
    {
        $response = $this->get(route('page.create'));
        $response->assertViewIs('admin::pages.create');
    }

    /**
     * Page Store
     *
     * @return void
     */
    public function test_page_store()
    {
        $response = $this->post(route('page.store'), [
            'title' => 'Contact Us',
            'slug' => 'contact-us',
            'description' => 'contact-us',
            'keywords' => 'Contact-us, website',
            'location' => '1',
            'status' => '1',
            'titleShow' => '1',
            'content' => '<p>This is contact us page.</p>',
        ]);

        $page = Pages::where('id', 2)->first();
        $this->assertEquals('Contact Us', $page->title);
        $this->assertEquals('contact-us', $page->slug);
        $this->assertEquals('contact-us', $page->meta_description);
        $this->assertEquals('Contact-us, website', $page->meta_key);
        $this->assertEquals('1', $page->location);
        $this->assertEquals('1', $page->status);
        $this->assertEquals('1', $page->show_title);
        $this->assertEquals('<p>This is contact us page.</p>', $page->description);

        $response->assertStatus(200);
    }

    /**
     * Page Detele
     * @return void
     */
    public function test_page_delete()
    {
        $page = Pages::where('id', 1)->first();
        $response = $this->post(route('page.delete', $page->UUID));

        $page = Pages::where('id', 1)->first();
        $this->assertEquals(0, $page);
        $response->assertStatus(200);
    }

    /**
     * Page Edit
     *
     * @return void
     */
    public function test_page_edit()
    {
        $page_data = Pages::where('id', 1)->first();
        $response = $this->get(route('page.edit', $page_data->UUID));

        $page = Pages::where('UUID', $page_data->UUID)->first();
        $response->assertViewIs('admin::pages.edit');
    }

    /**
     * Page Update
     * @return void
     */
    public function test_page_update()
    {
        $page = Pages::where('id', 1)->first();
        $response = $this->post(route('page.update'), [
            'id' => $page->UUID,
            'title' => 'Contact Us',
            'slug' => 'contact-us',
            'description' => 'contact-us',
            'keywords' => 'contact-us, website',
            'location' => '1',
            'status' => '1',
            'titleShow' => '1',
            'content' => '<p>This is contact us page.</p>',
        ]);

        $page = Pages::where('id', 1)->first();
        $this->assertEquals('Contact Us', $page->title);
        $this->assertEquals('contact-us', $page->slug);
        $this->assertEquals('contact-us', $page->meta_description);
        $this->assertEquals('contact-us, website', $page->meta_key);
        $this->assertEquals('1', $page->location);
        $this->assertEquals('1', $page->status);
        $this->assertEquals('1', $page->show_title);
        $this->assertEquals('<p>This is contact us page.</p>', $page->description);

        $response->assertStatus(200);
    }

    /**
     * @return void
     */
    public function test_page_filter_list()
    {
        $search = 'about';
        $data['pages'] = pages::latest()->where('title', 'LIKE', "%{$search}%")->paginate(10);
        $response = $this->get(route('page.list'));
        $response->assertSee($data['pages']);
        $response->assertViewIs('admin::pages.pages_list');
    }
}
