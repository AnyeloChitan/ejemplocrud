<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Categoria;
use Database\Seeders\DatabaseSeeder;
use PHPUnit\Framework\Attributes\Test;

class CategoriaControllerTest extends TestCase
{
    use RefreshDatabase;
    protected function setUp(): void
    {
     parent::setUp();
     // Ejecutar el seeder principal
    $this->seed(DatabaseSeeder::class);

    // Crear y autenticar un usuario con el rol de administrador
    $user = User::factory()->create();
    $user->assignRole('admin'); // Asignar el rol de administrador

    $this->actingAs($user);
    }

    #[Test]

    public function puede_listar_categorias(){
        Categoria::factory()->count(5)->create();
        $response=$this->get(route('categoria.index'));
        $response->assertStatus(200);
        $response->assertViewHas('categorias');
    }

    #[Test]
    public function puede_crear_una_categoria()
    {
        $data = [
            'nombre' => 'Nueva Categoria',
            'descripcion' => 'Descripción de prueba',
            'status' => true,
        ];
        $response = $this->post(route('categoria.store'), $data);
        $response->assertRedirect(route('categoria.index'));
        $this->assertDatabaseHas('categorias', ['nombre' => 'Nueva Categoria']);
    }
    #[Test]
    public function puede_actualizar_una_categoria()
    {
           $categoria = Categoria::factory()->create();
   
           $data = [
               'nombre' => 'Categoria Actualizada',
               'descripcion' => 'Descripción actualizada',
               'status' => false,
           ];   
           $response = $this->put(route('categoria.update', $categoria->id), $data);   
           $response->assertRedirect(route('categoria.index'));
           $this->assertDatabaseHas('categorias', ['nombre' => 'Categoria Actualizada']);
    }

    #[Test]
    public function puede_eliminar_una_categoria()
    {
        $categoria = Categoria::factory()->create();

        $response = $this->delete(route('categoria.destroy', $categoria->id));

        $response->assertRedirect(route('categoria.index'));
        $this->assertDatabaseMissing('categorias', ['id' => $categoria->id]);
    }


}
