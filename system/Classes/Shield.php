<?php
/**
 * Created by PhpStorm.
 * User: danero
 * Date: 1/23/16
 * Time: 10:28 AM
 */

class Shield {

    /* Protect the system from malicious attacks like CSRF.
     */
    public static function protect() {
        // to do csrf protection from authenticated request.
        return true;
    }

} 