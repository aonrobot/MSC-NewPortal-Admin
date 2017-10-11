<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel and Typeahead Tutorial</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <style>
    	span.twitter-typeahead{
    		display: block!important;
    	}
    	div.tt-menu{
    		width: 100%;
    	}
    </style>
  </head>
  <body>
  	<div class="container">
  		<h1>Laravel and Typeahead Tutorial</h1>
    	<hr>
    	<div class="row">
    		<div class="col-md-4">
    			<form class="typeahead" role="search">
			      <div class="form-group">
			        <input type="search" name="q" class="form-control search-input" placeholder="Search" autocomplete="off">
			      </div>
			    </form>
    		</div>
    	</div>
  	</div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins  and Typeahead) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Bootstrap JS -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Typeahead.js Bundle -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/typeahead.js/0.11.1/typeahead.bundle.min.js"></script>
    <!-- Typeahead Initialization -->
    <script>
        jQuery(document).ready(function($) {
            // Set the Options for "Bloodhound" suggestion engine
            var engine = new Bloodhound({
                remote: {
                    url: 'searchEmp/find?q=%QUERY%',
                    wildcard: '%QUERY%'
                },
                datumTokenizer: Bloodhound.tokenizers.whitespace('q'),
                queryTokenizer: Bloodhound.tokenizers.whitespace
            });

            $(".search-input").typeahead({
                hint: true,
                highlight: true,
                minLength: 1
            }, {
                source: engine.ttAdapter(),

                // This will be appended to "tt-dataset-" to form the class name of the suggestion menu.
                name: 'usersList',
                display: function(item){ return item.EmpCode+'– '+item.FirstName+' ('+item.NickName+')'},

                // the key from the array we want to display (name,id,email,etc...)
                templates: {
                    empty: [

                        '<div class="list-group search-results-dropdown"><div class="list-group-item">Nothing found.</div></div>'
                    ],
                    header: [
                        '<div class="list-group search-results-dropdown">'
                    ],
                    suggestion: function (data) {
                    	var img_link = 'http://appmetro.metrosystems.co.th/empimages/' + parseInt(data.EmpCode) + '.jpg?' + Math.floor((Math.random() * 10000) + 1)
                        return '<a class="list-group-item">'+
	                        '<img src="'+ img_link +'" class="img-reponsive" height="80"><br><br>'+
	                        data.NickName + ' - @' + data.OrgUnitName	 +
                         '</a>'
                        //return '<img src="'+ img_link +'" class="img-reponsive" height="80"><br>'
              }
                }
            });
        });
    </script>
  </body>
</html>