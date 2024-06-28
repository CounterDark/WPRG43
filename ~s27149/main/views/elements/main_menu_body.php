<?php
if (!isset($_SESSION)) {
    session_start();
}

?>
<section class="content-wrapper">
    <div class="main-menu-wrapper">
        <div class="main-menu-header">
            <h1>Menu główne</h1>
        </div>
        <div class="main-menu-box">
            <div class="main-menu-box-body">
                <div class="grid-elem">
                    <a href="/~s27149/main/game_select.php">Wybierz quiz</a>
                </div>
                <div class="grid-elem">
                    <a href="/~s27149/main/create.php">Utwórz quiz</a>
                </div>
            </div>
        </div>
    </div>
</section>