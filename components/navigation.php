    <div class="navbar  navbar-inverse navbar-fixed-top">
      <div class="container-fluid">

        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#"><img src="<?=H?>logo_sm.png"></a>
        </div>        
        <ul class="nav navbar-nav">
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Screens <span class="caret"></span></a>
            <ul class="dropdown-menu">
              <?foreach($screens as $nav){?>
              <li><a href="<?=H.'edit/'.$nav['slug']?>"><?=$nav['name']?></a></li>
              <?}?>
            </ul>
          </li>
          
        </ul>
        <form class="navbar-form navbar-right">
           <div class="input-group">
            
            <input id="query" type="text" class="form-control" placeholder="john 3:1-5">
            <span class="input-group-btn">
              <button id="search" class="btn btn-default" type="submit"><?=i('search')?></button>
            </span>
          </div><!-- /input-group -->         
          
        </form>        
      </div>
    </div>


