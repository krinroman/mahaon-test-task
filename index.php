<?php

    require __DIR__."/test.php";

    //Testing
    echo "<pre>";
    testConfig("site_url");
    testConfig("db.user");
    testConfig("app.services.resizer.fallback_format");
    testConfig("db.host", "localhost");
    testConfig("db.host");
    echo "</pre>";

