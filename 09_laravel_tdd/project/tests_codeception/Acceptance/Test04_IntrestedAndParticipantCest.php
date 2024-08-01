<?php

namespace TestsCodeception\Acceptance;

use TestsCodeception\Support\AcceptanceTester;

class Test04_IntrestedAndParticipantCest
{
    public function test(AcceptanceTester $I): void
    {
        $I->wantTo('login on dashboard');

        $I->amOnPage('/dashboard');

        $I->fillField('email', 'john.doe@gmail.com');
        $I->fillField('password', 'secret');

        $I->click('Log in');

        $I->wantTo('Have intrested person in database');

        $I->amOnPage('/events');

        $I ->click('Create new event');

        $eventName = 'eventName';
        $eventLocation = 'eventLocation';
        $eventType = 'eventType';
        $eventDate = '2024-01-04 09:04:56';
        $eventP_limit = '5';

        $I ->fillField('name', $eventName);
        $I ->fillField('type', $eventType);
        $I ->fillField('date', $eventDate);
        $I ->fillField('location', $eventLocation);
        $I ->fillField('p_limit', $eventP_limit);

        $I ->click('Create');

        $id = $I->grabFromDatabase('events', 'id', ['name' => $eventName]);

        $I->amOnPage('/events');

        $I ->click('Details');

        $I->amOnPage('/events/' . $id);

        $I ->click('Interested');

        $I ->seeInDatabase('intresteds', [
            'event_id' => $id,
        ]);


        $I->amOnPage('/events');

        $I ->click('Details');

        $I->amOnPage('/events/' . $id);

        $I ->click('Participant');

        $I ->dontSeeInDatabase('participants', [
            'event_id' => $id,
        ]);


        $I->see('List of participants', 'h2');


        #$I ->click('Delete');

        $I->amOnPage('/dashboard');

        $I->click('John Doe');

        $I->click('Log Out');
        $I->click('Log in');

        $I->fillField('email', 'joan.doe@gmail.com');
        $I->fillField('password', 'secret');
        $I->click('Log in');

        $I->amOnPage('/events');

        $I->click('Details');
        $I->click('Participant');

        $I ->seeInDatabase('participants', [
            'event_id' => $id,
        ]);
        $I->click('Events');

        $I ->click('Create new event');

        $eventName = 'run';
        $eventLocation = 'eventLocation1';
        $eventType = 'eventType1';
        $eventDate = '2024-01-03 09:04:56';
        $eventP_limit = '3';

        $I ->fillField('name', $eventName);
        $I ->fillField('type', $eventType);
        $I ->fillField('date', $eventDate);
        $I ->fillField('location', $eventLocation);
        $I ->fillField('p_limit', $eventP_limit);

        $I ->click('Create');
        $I->amOnPage('/events');


        $I ->selectOption('dropdown', "Name");
        $I ->fillField("input[name=search]", $eventName);
        $I ->click('Search');
        $I -> see($eventName);
        $I -> dontSee('eventName');

    }

}
