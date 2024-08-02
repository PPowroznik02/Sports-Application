<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test03_EventCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('login on dashboard');

        $I->amOnPage('/dashboard');

        $I->fillField('email', 'john.doe@gmail.com');
        $I->fillField('password', 'secret');

        $I->click('Log in');

        $I->wantTo('have events page');

        $I->amOnPage('/events');
        $I->seeCurrentUrlEquals('/events');
        $I->see('List of events', 'h2');
        $I->see('There are no events');
        $I ->click('Create new event');
        $I->seeCurrentUrlEquals('/events/create');
        $I->see('Creating an event', 'h2');

        $eventName = 'asd';
        $eventLocation = 'asssd';
        $eventType = 'aasd';
        $eventDate = '2024-01-04 09:04:56';
        $eventP_limit = '5';

        $I ->fillField('name', $eventName);
        $I ->fillField('type', $eventType);
        $I ->fillField('date', $eventDate);
        $I ->fillField('location', $eventLocation);
        $I ->fillField('p_limit', $eventP_limit);

        $I ->click('Create');

        $I ->seeInDatabase('events', [
            'name' => $eventName,
            'type' => $eventType,
            'location' => $eventLocation,
            'p_limit' => $eventP_limit,
            'date' => $eventDate,

        ]);

        $id = $I->grabFromDatabase('events', 'id', ['name' => $eventName]);

        $I->seeCurrentUrlEquals('/events/'.$id);
        $I->see('Viewing an event', 'h2');
        $I->see($eventName);
        $I->see($eventType);
        $I->see($eventDate);
        $I->see($eventLocation);
        $I->see($eventP_limit);


        $I->amOnPage('/events');
        $I->see($eventName);
        $I->dontSee($eventType);

        $I->wantTo('edit an event');

        $I->click('Details');

        $I->seeCurrentUrlEquals('/events/' . $id);

        $I->click('Edit');

        $I->seeCurrentUrlEquals('/events/' . $id . '/edit');

        $I->see('Editing an event', 'h2');

        $I->seeInField('name', $eventName);
        $I->seeInField('type', $eventType);
        $I->seeInField('date', $eventDate);
        $I->seeInField('location', $eventLocation);
        $I->seeInField('p_limit', $eventP_limit);


        $I->fillField('name', "");

        $eventNewName = 'NewEventName';

        $I->fillField('name', $eventNewName);
        $I->click('Submit');

        $I->seeCurrentUrlEquals('/events/' . $id);

        $I->see($eventNewName);

        $I->dontSeeInDatabase('events', [
            'name' => $eventName,
            'type' => $eventType,
            'location' => $eventLocation,
            'p_limit' => $eventP_limit,
            'date' => $eventDate,

        ]);

        $I->seeInDatabase('events', [
            'name' => $eventNewName,
            'type' => $eventType,
            'location' => $eventLocation,
            'p_limit' => $eventP_limit,
            'date' => $eventDate,
        ]);

        $I->wantTo('delete an event');

        $I->click('Delete');

        $I->seeCurrentUrlEquals('/events');

        $I->dontSeeInDatabase('events', [
            'name' => $eventNewName,
            'type' => $eventType,
            'location' => $eventLocation,
            'p_limit' => $eventP_limit,
            'date' => $eventDate,
        ]);

    }

}
