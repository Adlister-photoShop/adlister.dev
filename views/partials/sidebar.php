 
<div class="nbar animated fadeInDown">
    <div class="hamburger">&#9776</div>
</div>

<div class="sideNav">
</div>
<div class="sideText">
    <button class="logInExit">X</button>
    <div class="nbarUserName">Hello, <?=$name?></div>
    <div class="logout"><a href="logout">Log Out</a></div>
    <div class="hline"></div>
    
    <div><a class="showProfile" data-toggle="modal" data-target="#userAccount">Profile</a></div>
    <div><a class="showPost" data-toggle="modal" data-target="#postPhoto">Post Photo</a></div>
    <div class="hline"></div>

    <form method="POST" class="search" action="/searchBar">
        <input type="text" name="searchText" placeholder="Search" class="inputs">
        <button type="submit" hidden></button>
    </form>


    <div class="list">

            <form method="POST" action="/">
            <input type="hidden" value="animals" name="animals">
            <div><button class="cat" type="submit">All</button></div>
            </form>

            <form method="POST" action="category">
            <input type="hidden" value="animals" name="animals">
            <div><button class="cat" type="submit">Animals</button></div>
            </form>

            <form method="POST" action="category">
            <input type="hidden" value="architectural" name="architectural">
            <div><button class="cat" type="submit">Architectural</button></div>
            </form>

            <form method="POST" action="category">
            <input type="hidden" value="cars" name="cars">
            <div><button class="cat" type="submit">Cars</button></div>
            </form>

            <form method="POST" action="category">
            <input type="hidden" value="nature" name="nature">
            <div><button class="cat" type="submit">Nature</button></div>
            </form>

            <form method="POST" action="category">
            <input type="hidden" value="portraits" name="portraits">
            <div><button class="cat" type="submit">Portraits</button></div>
            </form>

            <form method="POST" action="category">
            <input type="hidden" value="sports" name="sports">
            <div><button class="cat" type="submit">Sports</button></div>
            </form>

            <form method="POST" action="category">
            <input type="hidden" value="other" name="other">
            <div><button class="cat" type="submit">Other</button></div>
            </form>

    </div>
    <div class="hline"></div>
    <div class="list">

            <form method="POST" action="sort">
                <input type="hidden" value="price" name="sortA">
                
                <div><button class="cat" type="submit">Lowest Price</button></div>
            </form>

            <form method="POST" action="sort">
                <input type="hidden" value="price" name="sortD">

                <div><button class="cat" type="submit">Highest Price</button></div>
            </form>

            <form method="POST" action="sort">
                <input type="hidden" value="date_posted" name="sortD">

                 <div><button class="cat" type="submit">Newest</button></div>
            </form>

            <form method="POST" action="sort">
                <input type="hidden" value="date_posted" name="sortA">
               
                <div><button class="cat" type="submit">Oldest</button></div>
            </form>

    </div>
</div>
