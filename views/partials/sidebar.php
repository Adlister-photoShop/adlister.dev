 
<div class="nbar animated fadeInDown">
    <div class="hamburger">&#9776</div>
</div>

<div class="sideNav">
</div>
<div class="sideText">
    <button class="logInExit">X</button>
    <div class="showProfile">Hello <?=$name?></div>
    <div class="logout"><a href="logout">Log Out</a></div>
    
    <div><a class="showProfile" data-toggle="modal" data-target="#userAccount">Profile</a></div>
    <div><a class="showPost" data-toggle="modal" data-target="#postPhoto">Post Photo</a></div>
    <div class="hline"></div>
    <!-- <form class="search">
        <input type="text">
        <button type="submit">Search</button>
    </form> -->
    <div class="showPost">Catagories</div>
    <div class="list">
        <ul>
            <form method="POST" action="category">
            <input type="hidden" value="animals" name="animals">
            <li><button type="submit">Animals</button></li>
            </form>

            <form method="POST" action="category">
            <input type="hidden" value="architectural" name="architectural">
            <li><button type="submit">Architectural</button></li>
            </form>

            <form method="POST" action="category">
            <input type="hidden" value="cars" name="cars">
            <li><button type="submit">Cars</button></li>
            </form>

            <form method="POST" action="category">
            <input type="hidden" value="nature" name="nature">
            <li><button type="submit">Nature</button></li>
            </form>

            <form method="POST" action="category">
            <input type="hidden" value="portraits" name="portraits">
            <li><button type="submit">Portraits</button></li>
            </form>

            <form method="POST" action="category">
            <input type="hidden" value="sports" name="sports">
            <li><button type="submit">Architectural</button></li>
            </form>

            <form method="POST" action="category">
            <input type="hidden" value="other" name="other">
            <li><button type="submit">Other</button></li>
            </form>

            <!-- <li><a href="architectural">Architectural</a></li>
            <li><a href="cars">Cars</a></li>
            <li><a href="nature">Nature</a></li>
            <li><a href="portraits">Portraits</a></li>
            <li><a href="sports">Sports</a></li>
            <li><a href="other">other</a></li> -->
        </ul>
    </div>
    <div class="hline"></div>
    <div class="showPost">Sort</div>
    <div class="list">
        <ul>
            <li><a href="name">Name</a></li>
            <li><a href="price">Price</a></li>
            <li><a href="date_added">Date Added</a></li>
        </ul>
    </div>
</div>
