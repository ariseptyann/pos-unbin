<?php

use CodeIgniter\Test\CIUnitTestCase;
<<<<<<< HEAD
use Config\Services;
=======
>>>>>>> 8b3c2762c59404147fb47168334e4fd79857db71

/**
 * @internal
 */
final class ExampleSessionTest extends CIUnitTestCase
{
    public function testSessionSimple()
    {
<<<<<<< HEAD
        $session = Services::session();

        $session->set('logged_in', 123);
        $this->assertSame(123, $session->get('logged_in'));
=======
        $this->session->set('logged_in', 123);
        $this->assertSame(123, $this->session->get('logged_in'));
>>>>>>> 8b3c2762c59404147fb47168334e4fd79857db71
    }
}
