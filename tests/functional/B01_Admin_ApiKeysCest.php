<?php
class B01_Admin_ApiKeysCest extends CestAbstract
{
    /**
     * @before setupComplete
     * @before login
     */
    public function manageApiKeys(FunctionalTester $I)
    {
        $I->wantTo('Administer API keys.');

        $I->amOnPage('/admin/api');
        $I->see('API Keys');

        $I->click('.btn-float', '#content'); // Plus sign

        $I->submitForm('.form', [
            'owner' => 'API Key Test',
        ]);

        $I->seeCurrentUrlEquals('/admin/api');
        $I->see('API Key Test');

        $I->click(\Codeception\Util\Locator::lastElement('.btn-danger'));

        $I->seeCurrentUrlEquals('/admin/api');
        $I->dontSee('API Key Test');
    }
}
