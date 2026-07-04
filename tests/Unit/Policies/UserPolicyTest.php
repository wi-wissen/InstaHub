<?php

use App\Facades\RequestHub;
use App\Models\User;
use App\Policies\UserPolicy;

beforeEach(function () {
    $this->policy = new UserPolicy;
});

function mockOutsideHubForUserPolicyTest(): void
{
    RequestHub::shouldReceive('isHub')->andReturn(false);
}

function mockInsideHubForUserPolicyTest(): void
{
    RequestHub::shouldReceive('isHub')->andReturn(true);
}

describe('viewAny', function () {
    it('allows anyone inside a hub', function () {
        mockInsideHubForUserPolicyTest();

        expect($this->policy->viewAny(User::factory()->user()->make()))->toBeTrue();
    });

    it('outside a hub, only admins may view any user', function () {
        mockOutsideHubForUserPolicyTest();

        expect($this->policy->viewAny(User::factory()->admin()->make()))->toBeTrue();
        expect($this->policy->viewAny(User::factory()->teacher()->make()))->toBeFalse();
        expect($this->policy->viewAny(User::factory()->user()->make()))->toBeFalse();
    });
});

describe('view', function () {
    it('allows anyone inside a hub to view any user', function () {
        mockInsideHubForUserPolicyTest();

        $user = User::factory()->user()->create();
        $other = User::factory()->user()->create();

        expect($this->policy->view($user, $other))->toBeTrue();
    });

    it('outside a hub, allows admins or the user themself', function () {
        mockOutsideHubForUserPolicyTest();

        $admin = User::factory()->admin()->create();
        $user = User::factory()->user()->create();
        $otherUser = User::factory()->user()->create();

        expect($this->policy->view($admin, $user))->toBeTrue();
        expect($this->policy->view($user, $user))->toBeTrue();
        expect($this->policy->view($user, $otherUser))->toBeFalse();
    });
});

describe('create', function () {
    it('inside a hub, requires at least dba', function () {
        mockInsideHubForUserPolicyTest();

        expect($this->policy->create(User::factory()->dba()->make()))->toBeTrue();
        expect($this->policy->create(User::factory()->teacher()->make()))->toBeTrue();
        expect($this->policy->create(User::factory()->admin()->make()))->toBeTrue();
        expect($this->policy->create(User::factory()->user()->make()))->toBeFalse();
    });

    it('outside a hub, requires admin', function () {
        mockOutsideHubForUserPolicyTest();

        expect($this->policy->create(User::factory()->admin()->make()))->toBeTrue();
        expect($this->policy->create(User::factory()->dba()->make()))->toBeFalse();
        expect($this->policy->create(User::factory()->teacher()->make()))->toBeFalse();
    });
});

describe('update', function () {
    it('inside a hub, allows dba or the user themself', function () {
        mockInsideHubForUserPolicyTest();

        $dba = User::factory()->dba()->create();
        $user = User::factory()->user()->create();
        $otherUser = User::factory()->user()->create();

        expect($this->policy->update($dba, $user))->toBeTrue();
        expect($this->policy->update($user, $user))->toBeTrue();
        expect($this->policy->update($user, $otherUser))->toBeFalse();
    });

    it('outside a hub, allows admin or the user themself', function () {
        mockOutsideHubForUserPolicyTest();

        $admin = User::factory()->admin()->create();
        $user = User::factory()->user()->create();
        $otherUser = User::factory()->user()->create();

        expect($this->policy->update($admin, $user))->toBeTrue();
        expect($this->policy->update($user, $user))->toBeTrue();
        expect($this->policy->update($user, $otherUser))->toBeFalse();
    });
});

describe('delete', function () {
    it('inside a hub, requires dba', function () {
        mockInsideHubForUserPolicyTest();

        expect($this->policy->delete(User::factory()->dba()->make(), User::factory()->user()->make()))->toBeTrue();
        expect($this->policy->delete(User::factory()->user()->make(), User::factory()->user()->make()))->toBeFalse();
    });

    it('outside a hub, requires admin', function () {
        mockOutsideHubForUserPolicyTest();

        expect($this->policy->delete(User::factory()->admin()->make(), User::factory()->user()->make()))->toBeTrue();
        expect($this->policy->delete(User::factory()->dba()->make(), User::factory()->user()->make()))->toBeFalse();
    });
});

describe('toggleActive', function () {
    it('inside a hub, requires dba', function () {
        mockInsideHubForUserPolicyTest();

        expect($this->policy->toggleActive(User::factory()->dba()->make(), User::factory()->user()->make()))->toBeTrue();
        expect($this->policy->toggleActive(User::factory()->user()->make(), User::factory()->user()->make()))->toBeFalse();
    });

    it('outside a hub, requires admin', function () {
        mockOutsideHubForUserPolicyTest();

        expect($this->policy->toggleActive(User::factory()->admin()->make(), User::factory()->user()->make()))->toBeTrue();
        expect($this->policy->toggleActive(User::factory()->dba()->make(), User::factory()->user()->make()))->toBeFalse();
    });
});

describe('changePassword', function () {
    it('inside a hub, allows dba or the user themself', function () {
        mockInsideHubForUserPolicyTest();

        $dba = User::factory()->dba()->create();
        $user = User::factory()->user()->create();

        expect($this->policy->changePassword($dba, $user))->toBeTrue();
        expect($this->policy->changePassword($user, $user))->toBeTrue();
        expect($this->policy->changePassword(User::factory()->user()->create(), $user))->toBeFalse();
    });

    it('outside a hub, allows admin or the user themself', function () {
        mockOutsideHubForUserPolicyTest();

        $admin = User::factory()->admin()->create();
        $user = User::factory()->user()->create();

        expect($this->policy->changePassword($admin, $user))->toBeTrue();
        expect($this->policy->changePassword($user, $user))->toBeTrue();
        expect($this->policy->changePassword(User::factory()->dba()->create(), $user))->toBeFalse();
    });
});
