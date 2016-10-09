 
<div class="nbar animated fadeInDown">
    <div class="hamburger">&#9776</div>
</div>

<div class="sideNav">
</div>
<div class="sideText">
    <button class="logInExit">X</button>
    <div class="showProfile">Welcome to photoSHOP</div>
    <div class="logout"><a href="logout">Log Out</a></div>
    
    <div><a class="showProfile" data-toggle="modal" data-target="#login">Log In</a></div>
    <div class="hline"></div>

    <form method="POST" class="search" action="/searchBar">
        <input type="text" name="searchText">
        <button type="submit">Search</button>
    </form>

    <div class="showPost">Catagories</div>
    <div class="list">
        <ul>
            <form method="POST" action="/">
            <input type="hidden" value="animals" name="animals">
            <li><button class="cat" type="submit">All</button></li>
            </form>

            <form method="POST" action="category">
            <input type="hidden" value="animals" name="animals">
            <li><button class="cat" type="submit">Animals</button></li>
            </form>

            <form method="POST" action="category">
            <input type="hidden" value="architectural" name="architectural">
            <li><button class="cat" type="submit">Architectural</button></li>
            </form>

            <form method="POST" action="category">
            <input type="hidden" value="cars" name="cars">
            <li><button class="cat" type="submit">Cars</button></li>
            </form>

            <form method="POST" action="category">
            <input type="hidden" value="nature" name="nature">
            <li><button class="cat" type="submit">Nature</button></li>
            </form>

            <form method="POST" action="category">
            <input type="hidden" value="portraits" name="portraits">
            <li><button class="cat" type="submit">Portraits</button></li>
            </form>

            <form method="POST" action="category">
            <input type="hidden" value="sports" name="sports">
            <li><button class="cat" type="submit">Sports</button></li>
            </form>

            <form method="POST" action="category">
            <input type="hidden" value="other" name="other">
            <li><button class="cat" type="submit">Other</button></li>
            </form>

        </ul>
    </div>
    <div class="hline"></div>
    <div class="showPost">Sort By</div>
    <div class="list">
        <ul>
            <form method="POST" action="sort">
                <input type="hidden" value="price" name="sortA">
                
                <li><button class="cat" type="submit">Lowest Price</button></li>
            </form>

            <form method="POST" action="sort">
                <input type="hidden" value="price" name="sortD">

                <li><button class="cat" type="submit">Highest Price</button></li>
            </form>

            <form method="POST" action="sort">
                <input type="hidden" value="date_posted" name="sortD">

                 <li><button class="cat" type="submit">Newest</button></li>
            </form>

            <form method="POST" action="sort">
                <input type="hidden" value="date_posted" name="sortA">
               
                <li><button class="cat" type="submit">Oldest</button></li>
            </form>
        </ul>
    </div>
</div>






<div class="modal fade" id="login" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h4 class="modal-title" id="myModalLabel">Sell Your Photo</h4>
      </div>
      <div class="modal-body">

        <div class="logInContainer">
            <div class="logInParent">
                <div class="logInToggle">
                    <button class="logInShow">Log In</button>
                    <button class="signUpShow">Sign Up</button>
                </div>
                
                <div class="logIn">
                    <form method="POST" id="logIn" action="/">
                        <input type="text" name="email" placeholder="Email" class="inputs" autofocus>
                        <input type="password" name="password" placeholder="Password" class="inputs">
                        <button type="submit" class="logInBtn">Log in</button>
                    </form>
                </div>

                <div class="signUp" >
                    <form method="POST" action="/">
                        <input type="text" name="name" placeholder="Your Name" class="inputs" required="true">
                        <input type="text" name="email" placeholder="Email" class="inputs" required="true">
                        <input type="password" name="password" placeholder="Password" class="inputs" required="true">
                        <input type="password" name="conPassword" placeholder="Confirm Password" class="inputs" required="true">
                        <button type="submit" class="logInBtn">Sign Up</button>
                    </form>
                </div>
            </div>
        </div>

      </div>
    </div>
  </div>
</div>
