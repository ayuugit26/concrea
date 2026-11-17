<?php
namespace Database\Seeders;

use App\Models\{Category, Product, Finish, Project};
use Illuminate\Database\Seeder;

class ConcreaSeeder extends Seeder
{
    public function run(): void
    {
        $cats = [
            ['Dining Tables', 'dining-tables', 'Gathering, engineered.', 'dining.jpg', false, 1],
            ['Coffee Tables', 'coffee-tables', 'Low-profile sculpture.', 'coffee.jpg', false, 2],
            ['Stools & Side Tables', 'stools-side-tables', 'Small pieces, big presence.', 'stools.jpg', false, 3],
            ['Custom Design', 'custom-design', 'Made to your brief', 'custom.jpg', true, 4],
        ];
        foreach ($cats as [$name, $slug, $tag, $img, $dark, $order]) {
            Category::create(compact('name', 'slug') + [
                'tagline' => $tag, 'image' => $img, 'is_dark' => $dark, 'sort_order' => $order,
            ]);
        }

        $stools = Category::where('slug', 'stools-side-tables')->first();
        $coffee = Category::where('slug', 'coffee-tables')->first();

        Product::create([
            'category_id' => $stools->id, 'name' => 'Vero Side Table', 'slug' => 'vero-side-table',
            'collection' => 'Vero Collection', 'color_label' => 'Sage',
            'spec_line' => 'Fiberstone GRC · Sage Smooth',
            'description' => 'Sage-green side table with an oval cut-out.',
            'image' => 'vero.jpg', 'image_insitu' => 'vero-insitu.jpg',
            'is_hero' => true, 'is_featured' => true, 'featured_order' => 3,
        ]);

        Product::create([
            'category_id' => $stools->id, 'name' => 'Uzura Side Table', 'slug' => 'uzura-side-table',
            'collection' => 'Uzura Collection', 'spec_line' => 'Natural concrete · Smooth finish (TBC)',
            'image' => 'uzura.jpg', 'image_insitu' => 'uzura-insitu.jpg',
            'is_featured' => true, 'featured_order' => 1,
        ]);

        Product::create([
            'category_id' => $coffee->id, 'name' => 'Gaia Coffee Table', 'slug' => 'gaia-coffee-table',
            'collection' => 'Gaia Collection', 'spec_line' => 'Natural concrete · Industrial finish (TBC)',
            'image' => 'gaia.jpg', 'image_insitu' => 'gaia-insitu.jpg',
            'is_featured' => true, 'featured_order' => 2,
        ]);

        Product::create([
            'category_id' => $stools->id, 'name' => 'Tuby Swivel Stool', 'slug' => 'tuby-swivel-stool',
            'collection' => 'Tuby Collection', 'spec_line' => 'Lightweight concrete · Hidden swivel',
            'description' => 'A smooth-swiveling stool in lightweight concrete with a concealed rotating mechanism. It invites you to sit, spin, and stay a little longer.',
            'specs' => [
                'Material' => 'Lightweight concrete (TBC)',
                'Seat height' => '45 cm (TBC)',
                'Mechanism' => 'Concealed swivel',
                'Finishes' => 'Natural, Smooth, Terrazzo (TBC)',
            ],
            'image' => 'tuby.jpg', 'image_insitu' => 'tuby-insitu.jpg',
            'is_spotlight' => true,
        ]);

        $finishes = [
            ['Natural', 'natural', 'Natural', 'Raw, honest concrete with subtle tonal variation. (Teks TBC)', 'natural.jpg'],
            ['Smooth', 'smooth', 'Smooth Solid', 'A smooth surface with minimal pores and a clean, modern look.', 'smooth.jpg'],
            ['Industrial', 'industrial', 'Fiberstone (GRC)', 'Lightweight and strong, suited to large spans and slim forms.', 'industrial.jpg'],
            ['Terrazzo', 'terrazzo', 'Custom Terrazzo', 'Stone aggregates and colour chips, made to your request.', 'terrazzo.jpg'],
        ];
        foreach ($finishes as $i => [$name, $slug, $title, $desc, $img]) {
            Finish::create(compact('name', 'slug', 'title') + [
                'description' => $desc, 'image' => $img, 'sort_order' => $i + 1,
            ]);
        }

        foreach ([['Boutique Hotel', 'Hotel', 'hotel.jpg'], ['Restaurant Terrace', 'Restaurant', 'resto.jpg'], ['Private Villa', 'Villa', 'villa.jpg']] as $i => [$t, $type, $img]) {
            Project::create(['title' => $t, 'type' => $type, 'image' => $img, 'sort_order' => $i + 1]);
        }
    }
}