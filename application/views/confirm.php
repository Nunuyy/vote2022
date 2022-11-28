
<div id="body">


<div class="container">
  <div class="col-md-12 col-lg-10 offset-lg-1">
    <div class="page-header">
      <a class="float-right" href="https://github.com/mistic100/Bootstrap-Confirmation">
        <img src="https://assets.github.com/images/icons/emoji/octocat.png" width=48px height=48px>
      </a>
      <h1>Bootstrap Confirmation</h1>
    </div>

    <div class="card mb-3">
      <div class="card-header">Basic</div>
      <div class="card-body">
        <button class="btn btn-primary" data-toggle="confirmation">Confirmation</button>
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-header">Link</div>
      <div class="card-body">
        <a class="btn btn-primary" data-toggle="confirmation"
           href="https://google.com" target="_blank">Go to Google</a>
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-header">Customize</div>
      <div class="card-body">
        <button class="btn btn-primary" data-toggle="confirmation"
                data-btn-ok-label="Continue" data-btn-ok-class="btn-success"
                data-btn-ok-icon-class="material-icons" data-btn-ok-icon-content="check"
                data-btn-cancel-label="Stoooop!" data-btn-cancel-class="btn-danger"
                data-btn-cancel-icon-class="material-icons" data-btn-cancel-icon-content="close"
                data-title="Is it ok?" data-content="This might be dangerous">
          Confirmation
        </button>
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-header">Directions</div>
      <div class="card-body">
        <button class="btn btn-primary" data-toggle="confirmation" data-placement="left">Confirmation on left</button>
        <button class="btn btn-primary" data-toggle="confirmation" data-placement="top">Confirmation on top</button>
        <button class="btn btn-primary" data-toggle="confirmation" data-placement="bottom">Confirmation on bottom
        </button>
        <button class="btn btn-primary" data-toggle="confirmation" data-placement="right">Confirmation on right</button>
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-header">Singleton</div>
      <div class="card-body">
        <button class="btn btn-primary" data-toggle="confirmation-singleton" data-singleton="true">Confirmation 1
        </button>
        <button class="btn btn-primary" data-toggle="confirmation-singleton" data-singleton="true">Confirmation 2
        </button>
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-header">Popout</div>
      <div class="card-body">
        <button class="btn btn-primary" data-toggle="confirmation-popout" data-popout="true">Confirmation 1</button>
        <button class="btn btn-primary" data-toggle="confirmation-popout" data-popout="true">Confirmation 2</button>
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-header">Delegation</div>
      <div class="card-body" id="confirmation-delegate">
        <button class="btn btn-primary">Confirmation 1</button>
        <button class="btn btn-primary">Confirmation 2</button>
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-header">Custom event</div>
      <div class="card-body">
        <button class="btn btn-primary" data-toggle="custom-confirmation-events"
                data-trigger="manual"
                data-confirmation-event="myevent">
          Confirmation
        </button>
      </div>
    </div>

    <div class="card mb-3">
      <div class="card-header">Custom buttons</div>
      <div class="card-body">
        <button class="btn btn-primary" id="custom-confirmation">Choose your transportation</button>
        <button class="btn btn-primary" id="custom-confirmation-links">Share to</button>
      </div>
    </div>
  </div>
</div>


</div><!-- div#body -->
</body>
