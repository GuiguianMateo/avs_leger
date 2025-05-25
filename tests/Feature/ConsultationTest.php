<?php

namespace Tests\Feature;

use App\Models\Consultation;
use App\Models\praticien;
use App\Models\Type;
use App\Models\User;
use Tests\TestCase;
use Silber\Bouncer\BouncerFacade as Bouncer;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ConsultationTest extends TestCase
{

    use DatabaseTransactions;

    public function test_user_without_role_can_view_consultation_index() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get(uri: '/consultation');


        $response->assertStatus(status: 200);
        $response->assertViewIs( 'consultation.index');
    }

    public function test_user_without_role_can_create_consultation() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/consultation/create');

            $response->assertStatus(200);
            $response->assertViewIs( 'consultation.create');

    }

    public function test_user_without_role_can_store_consultation() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $praticien = Praticien::factory()->create();
        $type = Type::factory()->create();
        $user = User::factory()->create();

        $response = $this
            ->actingAs($user)
            ->post("/consultation", [
                'date_consultation' => '2022-12-22',
                'retard' => '1',
                'statu' => 'attente',
                'type_id' => $type->id,
                'user_id' => $user->id,
                'praticien_id' => $praticien->id,
            ]);

        $response->assertStatus( 302);
        $response->assertRedirect( "consultation");
    }

    public function test_user_without_role_cant_edit_consultation() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $consultation = Consultation::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/consultation/{$consultation->id}/edit");

        $response->assertStatus(401);
    }

    public function test_user_without_role_cant_update_consultation() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $type = Type::factory()->create();
        $praticien = Praticien::factory()->create();
        $consultation = Consultation::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/consultation/{$consultation->id}/edit", [
                'date_consultation' => '2022-12-22',
                'retard' => '1',
                'statu' => 'valide',
                'type_id' => $type->id,
                'user_id' => $user->id,
                'praticien_id' => $praticien->id,
            ]);

        $response->assertStatus(401);
    }

    public function test_user_without_role_cant_delete_consultation() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $consultation = Consultation::factory()->create();

        $response = $this
            ->actingAs($user)
            ->delete("/consultation/{$consultation->id}");

        $response->assertStatus(401);
    }

    public function test_user_without_role_cant_restore_consultation() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $consultation = Consultation::factory()->create();

        $consultation->delete();

        $response = $this
            ->actingAs($user)
            ->post("/consultation/{$consultation->id}/restore");

        $response->assertStatus(405);
    }

    public function test_user_without_role_can_view_demande() : void
    {
        $user = User::factory()->create();
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get(uri: '/demande');

        $response->assertStatus(200);
        $response->assertViewIs('consultation.demande');
    }

    /* --User With Abilities-- */
    public function test_user_with_role_can_create_consultation() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('praticien')->to($user);
        Bouncer::refresh();

        $response = $this
            ->actingAs($user)
            ->get('/consultation/create');

        $response->assertStatus(200);
    }



    public function test_user_with_role_can_edit_consultation() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('praticien')->to($user);
        Bouncer::refresh();

        $consultation = Consultation::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/consultation/{$consultation->id}/edit");

        $response->assertStatus(200);
    }

    public function test_user_with_role_can_update_consultation() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('praticien')->to($user);
        Bouncer::refresh();

        $consultation = Consultation::factory()->create();
        $type = Type::factory()->create();
        $praticien = Praticien::factory()->create();

        $response = $this
            ->actingAs($user)
            ->get("/consultation/{$consultation->id}/edit", [
                'date' => '2022-12-22',
                'deadline' => '2023-12-22',
                'delay' => '1',
                'type_id' => $type->id,
                'user_id' => $user->id,
                'praticien_id' => $praticien->id,
            ]);

        $response->assertStatus(200);
    }


    public function test_user_with_role_can_delete_consultation() : void
    {
        $user = User::factory()->create();
        Bouncer::assign('praticien')->to($user);
        Bouncer::refresh();


        $type = Type::factory()->create();
        $praticien = Praticien::factory()->create();

        $consultation = Consultation::factory()->create([
            'type_id' => $type->id,
            'praticien_id' => $praticien->id,
            'user_id' => $user->id,
        ]);

        $this->assertDatabaseHas('consultations', ['id' => $consultation->id]);

        $response = $this
            ->actingAs($user)
            ->delete("/consultation/{$consultation->id}");

        $response->assertRedirect('/consultation');

        $this->assertSoftDeleted('consultations', ['id' => $consultation->id]);

    }

}
