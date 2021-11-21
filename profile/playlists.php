<?php
session_start();
include 'connection.php'
 ?>

<!DOCTYPE html>
<style>
    .text{
		color: white;
		font-family: monospace;
		align-items: center;
		text-decoration: none;
	}
	.logo{
		color: white;
		font-family: monospace;
		font-size: 25px;
		cursor: pointer;
	}
	.navbar{
		width: 100%;
		height: 15vh;
		margin: auto;
		display: flex;
		align-items: center;
	}
	.headnav{
		flex: 1;
		padding-left: 100px;
	}
	nav ul li{
		display: inline-block;
		list-style: none;
		margin: 0px 60px;
	}
	nav ul li a{
		text-decoration: none;
		color: rgb(255, 255, 255);
		text-align: center;
	}
	.profile{
		display: inline-block;
		color: white;
		margin: auto;
		align-items: center;
	}
</style>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Metube: Profile</title>
    </head>
    <body style="background-color: rgb(42, 44, 44);">
        <header>
            <h2 class="text"><a href="MeTube.html" class="text">MeTube<3</a></h2>
            <h3 class="text">*User's name here*</h3>
        </header>
        <main>
            <section>
				<div class="navbar">
					<nav>
						<ul class="text">
							<li><a href="user_profile.php" >Media</a></li>
							<li><a href="playlists.html" ><b>Playlists</b></a></li>
							<li><a href="friends.html" >Friends</a></li>
                            <li><a href="about.php" >About</a></li>
                            <li><a href="user_profile.php" >Messages</a></li>
						</ul>
					</nav>
				</div>
			</section>
            <hr>
            <section>
              <div class="text">
                <h2> Playlists</h2>
                <h3> Create Playlist</h3>
              </div>

              <?php
              $uid = $_SESSION['userID'];
              $query = "SELECT * from user_playlists WHERE userID = '$uid'";
              $result = mysqli_query($conn,$query) or die ("Query error".mysqli_error($conn)."\n");

              $numrows = mysqli_num_rows($result);

              if($numrows == 0){
                echo "You currently have no playlists";
              }

              else{
              //looping through all the friends for the user
              while($rows = mysqli_fetch_assoc($result)){
                //using the join command to merge the table and get the information for the friends (username)
                $playlistname = $rows['playlist_name'];
                echo '<a href="playlistmedia.php?pid=1"> '.$playlistname.' </a>';
              }
            }
            ?>

            </section>
        </main>
    </body>
</html>