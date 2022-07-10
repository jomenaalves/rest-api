<?php 

    namespace Features\app\Http\Controllers;

use App\Models\Pokes;

    class PokeControllerTest extends \TestCase{

        public function testIfIsSuccessInUserGetPokesFromPokeApi(){
            // Act
            $this->post('/api/getPokes');

            // Assert
            $this->assertResponseStatus(201);
            $this->seeJsonContains(['msg' => 'Pokemons added in database with successfuly', 'status' => 201]);
        }

        public function testUserCanAddASpecificPokeInDatabase(){
            // Prepare
            $payload = [
                'name' => 'Specific Pokemon',
                'url' => 'https://google.com'
            ];

            // Act 
            $this->post('/api/addSpecificPoke', $payload);

            // Assert 
            $this->assertResponseStatus(201);
            $this->seeInDatabase('pokes', $payload);
        }

        public function testUserPassedInvalidArgumentsInPayload(){
         
            // Prepare
            $payload = [
                'Nadinha' => 'nadica de nada'
            ];

            // Act
            $this->post('/api/addSpecificPoke', $payload);

            // Assert 
            $this->assertResponseStatus(422); // UNPROCESSABLE ENTITY
        }

        public function testUserCanSeeAllDataInDatabase(){
            // Act 
            $this->get('/api/getPokes');

            // Assert
            $this->assertResponseOk();
        }

        public function testUserCanDeletePokeInDatabase(){

            // Prepare
            $poke = Pokes::factory()->create();

            // Act
            $this->delete('/api/deletePoke/'. $poke->id);

            // Assert 
            $this->assertResponseStatus(204); // 204 = No Content
            $this->notSeeInDatabase('pokes', [
                'id' => $poke->id
            ]);
        }

        public function testUsenPassedANotValidId(){
            // Prepare 
            $id = 0;

            // Act
            $this->delete('/api/deletePoke/'. $id);

            // Assert 
            $this->assertResponseStatus(404);
            $this->seeJsonContains(['msg' => 'not found']);

        }

    }