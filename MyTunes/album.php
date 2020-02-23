<?php include("includes/includedFiles.php");

    if(isset($_GET['id'])) {
        $albumId = $_GET['id'];
    }
    else {
        header("Location: index.php");
    }

    $album = new Album($con, $albumId);
    $artist = $album->getArtist();
    $artistId = $artist->getId();

    // TO CHECK THE WORKING OF THE FUNCTION :
    // echo $album->getTitle() . "<br>";
    // echo $artist->getName();
?>

<div class="entityInfo">
    <div class="leftSection">
        <img src="<?php echo $album->getArtworkPath(); ?>" alt="">
    </div>
    <div class="rightSection">
        <h2><?php echo $album->getTitle(); ?></h2>
        <p>By - <?php echo $artist->getName(); ?></p>
        <p><?php echo $album->getNumberOfSongs(); ?> songs</p>
    </div>
</div>

<div class="trackListContainer">
    <ul class="trackList">
        <?php
            $songIdArray = $album->getSongIds();

            $i = 1;
            foreach($songIdArray as $songId) {
                $albumSong = new Songs($con, $songId);
                $albumArtist = $albumSong->getArtist();

                echo "<li class='trackListRow'>

                        <div class='trackCount'>
                            <img src='assests/images/icons/play-white.png' class='play' onclick='setTrack(\"". $albumSong->getId() ."\", tempPlaylist, true)'>
                            <span class='trackNumber'>$i</span>
                        </div>

                        <div class='trackInfo'>
                            <span class='trackName'>" . $albumSong->getTitle() . "</span>
                            <span class='artistName'>". $albumArtist->getName() . "</span>
                        </div>

                        <div class='trackOptions'>
                            <input type='hidden' class='songId' value='". $albumSong->getId() ."'>
                            <img class='optionsButton' src='assests/images/icons/more.png' onclick='showOptionsMenu(this)'>
                        </div>

                        <div class='trackDuration'>
                            <span class='duration'>". $albumSong->getDuration() ."</span>
                        </div>
                      </li>";

            $i++;
            }

        ?>

        <script>
            var tempSongIds = '<?php echo json_encode($songIdArray); ?>';
            tempPlaylist = JSON.parse(tempSongIds);
        </script>
    </ul>
</div>

<div class="optionsMenu">
            <input type="hidden" class="songId">
            <?php echo Playlist::getPlaylistsDropdown($con, $userLoggedIn->getUsername()); ?>
</div>