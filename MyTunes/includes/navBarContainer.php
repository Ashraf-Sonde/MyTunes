

<div id="navBarContainer">
    <nav class="navBar">
        <span role="link" tabindex="0" onclick="openPage('index.php')" class="logo">
            <img src="assests/images/icons/logo.svg" alt="Logo">
        </span>

        <div class="group">
            <div class="navItem">
            <span role='link' tabindex='0' onclick='openPage("search.php")' class="navItemLink">Search
                    <img src="assests/images/icons/search.png" alt="Search" class="icon">
                </span>
            </div>
        </div>

        <div class="group">
            <div class="navItem">
                <span role="link" tabindex="0" onclick="openPage('browse.php')" class="navItemLink">Browse</span>
            </div>

            <div class="navItem">
                <span role="link" tabindex="0" onclick="openPage('yourMusic.php')" class="navItemLink">Your Music</span>
            </div>

            <div class="navItem">
                <span role="link" tabindex="0" onclick="openPage('settings.php')" class="navItemLink"><?php echo $userLoggedIn->getUsername(); ?></span>
            </div>
        </div>
    </nav>
</div>