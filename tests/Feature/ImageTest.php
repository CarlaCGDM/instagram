<?php
use App\Models\{Image, User};
use function Pest\Laravel\{actingAs, get};
use Illuminate\Foundation\Testing\RefreshDatabase;

//RefreshDatabase ejecuta las migraciones y los seeders cada vez que lanzamos los test
//beforeEach crea un usuario antes de ejecutar cada test

uses(RefreshDatabase::class);
beforeEach(fn () => User::factory()->create());

//primer test: comprobar que existe un usuario en la bbdd de prueba
//sail artisan test --filter ImageTest

it('has author')->assertDatabaseHas('users', [
    'id' => 1,
]);

//segundo test: comprobar que el usuario no registrado no puede ver el dashboard

it('user not logged cannot access to images page', function ()
{
  get('/images')
    ->assertRedirect('/login');
});

//tercer test: el usuario registrado sí puede ver el dashboard

it('user logged can access to images page', function ()
{
  actingAs(User::first())
    ->get('/images')
    ->assertStatus(200);
});

//cuarto y quinto test: el usuario registrado puede crear una imagen

it('user logged can access to create image page', function ()
{
  actingAs(User::first())
    ->get('/images/create')
    ->assertStatus(200);
});

//------------- comprobar que se puede crear imagen
it('user logged can create image', function ()
{
  actingAs(User::first())
    ->post('/images', [
      'description' => 'Description',
      'image_path' => "sample_images/sample_image (1)"
    ])
    ->assertRedirect(url()->previous())
    ->assertSessionHas('success', 'La imagen ha sido creada co
    rectamente');
});

//--------------comprobar que se puede editar imagen

//--------------comprobar que se puede dejar like y eliminarlo

//--------------comprobar que se puede dejar comentario

//--------------comprobar que se puede editar comentario
 
//--------------comprobar que se puede eliminar comentarios

//--------------comprobar que no se puede borrar imagen o comentario si no es tu publicacion

//--------------comprobar que se puede ver el listado de usuarios

//--------------