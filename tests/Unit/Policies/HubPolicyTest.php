<?php

use App\Models\Hub;
use App\Models\User;
use App\Policies\HubPolicy;

beforeEach(function () {
    $this->policy = new HubPolicy;
});

describe('viewAny', function () {
    it('allows admins and teachers', function () {
        expect($this->policy->viewAny(User::factory()->admin()->make()))->toBeTrue();
        expect($this->policy->viewAny(User::factory()->teacher()->make()))->toBeTrue();
    });

    it('denies plain users and dbas', function () {
        expect($this->policy->viewAny(User::factory()->user()->make()))->toBeFalse();
        expect($this->policy->viewAny(User::factory()->dba()->make()))->toBeFalse();
    });
});

describe('view', function () {
    it('allows an admin to view any hub', function () {
        $admin = User::factory()->admin()->create();
        $hub = Hub::factory()->create();

        expect($this->policy->view($admin, $hub))->toBeTrue();
    });

    it('allows the owning teacher to view their hub', function () {
        $teacher = User::factory()->teacher()->create();
        $hub = Hub::factory()->create(['teacher_id' => $teacher->id]);

        expect($this->policy->view($teacher, $hub))->toBeTrue();
    });

    it('denies a different teacher from viewing the hub', function () {
        $teacher = User::factory()->teacher()->create();
        $otherTeacher = User::factory()->teacher()->create();
        $hub = Hub::factory()->create(['teacher_id' => $otherTeacher->id]);

        expect($this->policy->view($teacher, $hub))->toBeFalse();
    });
});

describe('create', function () {
    it('allows anyone, including guests, to create a hub', function () {
        expect($this->policy->create(null))->toBeTrue();
        expect($this->policy->create(User::factory()->user()->make()))->toBeTrue();
    });
});

describe('update', function () {
    it('allows an admin to update any hub', function () {
        $admin = User::factory()->admin()->create();
        $hub = Hub::factory()->create();

        expect($this->policy->update($admin, $hub))->toBeTrue();
    });

    it('allows the owning teacher to update their hub', function () {
        $teacher = User::factory()->teacher()->create();
        $hub = Hub::factory()->create(['teacher_id' => $teacher->id]);

        expect($this->policy->update($teacher, $hub))->toBeTrue();
    });

    it('denies a different teacher from updating the hub', function () {
        $teacher = User::factory()->teacher()->create();
        $otherTeacher = User::factory()->teacher()->create();
        $hub = Hub::factory()->create(['teacher_id' => $otherTeacher->id]);

        expect($this->policy->update($teacher, $hub))->toBeFalse();
    });
});

describe('delete', function () {
    it('allows an admin to delete any hub', function () {
        $admin = User::factory()->admin()->create();
        $hub = Hub::factory()->create();

        expect($this->policy->delete($admin, $hub))->toBeTrue();
    });

    it('allows the owning teacher to delete their hub', function () {
        $teacher = User::factory()->teacher()->create();
        $hub = Hub::factory()->create(['teacher_id' => $teacher->id]);

        expect($this->policy->delete($teacher, $hub))->toBeTrue();
    });

    it('denies a different teacher from deleting the hub', function () {
        $teacher = User::factory()->teacher()->create();
        $otherTeacher = User::factory()->teacher()->create();
        $hub = Hub::factory()->create(['teacher_id' => $otherTeacher->id]);

        expect($this->policy->delete($teacher, $hub))->toBeFalse();
    });
});
