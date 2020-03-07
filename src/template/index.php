
    <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>API fetch</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.css" type="text/css" rel="stylesheet">
</head>
<style> 
    .hidden 
    {
        display: none;
    }

</style>
<body class="body">
        <header>
    </header>
        <main>
            <div class="pusher">
            <!-- /.pusher -->
            <div class="ui vertical stripe segment">
            <!-- /.ui vertical stripe segment -->
            <div class="ui container">
                
                    <div class="ui placeholder attached segment">
                        <div class="ui icon header">
                            <i class="github icon"></i> <!-- /.github icon -->
    <span> You can find something <br> here from the table below </span>
                        </div>
                        <div class="field">
    <div class="ui search">
        <div class="ui icon input">
            <input id="elastic" type="text" class="prompt" placeholder = "Search ..."/>
            <i class="search icon"></i> <!-- /.search icon -->
        </div>
        <!-- /.ui icon input -->
    </div>
    <!-- /.ui search -->
                        </div>
                        <!-- /.inline -->
                        <!-- /.ui icon header -->
                    </div>
                    <!-- /.ui placeholder -->
                    <!-- /.ui header -->
                
                <div class="ui attached segment">
             
            
                    <!-- /.ui loader active -->
        <table class="ui celled striped table" >
            <thead>
                <tr>
                    <?php
        foreach(Config::group('menu') as $key): ?>
        <th> <?= $key ?></th>
<?php endforeach; ?>
                </tr>
            </thead>
            <tbody>
            <?php foreach($features->products as $feature => $key): ?>
                    <tr >
                <td > <?= $key->code ?></td>
                <td > <?= $key->name ?></td>
                <td> <?= $key->price ?> </td>
                <?php if ($key->description !== '') :?>
                    <td > <?= $key->description ?></td>
                <?php else: ?>
                    <td >  This feature is an empty. </td>
                <?php endif;?>
               
                <td > <?= $key->weight ?> </td>
                <td > <?= $key->energyFullAmount ?></td>
                    </tr>
                
                <?php endforeach; ?>
            </tbody>
        </table>
        <!-- /.ui celled striped table -->
                </div>
                <!-- /.ui attached segment -->
                <div class="ui bottom success attached message">
                    <i class="check icon">

                    </i> <!-- /.check icon -->
                    
                        Thank you so much for reaching.
                    
                    
                </div>
                <!-- /.ui bottom attached segment -->
                <!-- /.ui top attached segment -->
            </div>
            </div>
            <!-- /.ui container -->
            <!-- /.ui vertical stripe -->
            </div>
            </main>
        <footer>
            <div class="ui inverted vertical footer segment">
                    <div class="ui container">
                        <div class="ui stackable inverted divided equal height grid">
                            <div class="three wide column">
                                <h4 class="ui inverted header">
                                    Hello, I'm Emil!
                                </h4>
                                <!-- /.ui inverted header -->
                              <div class="ui inverted list">
                                <a href="https://github.com/Emik123dsa" rel="nofollow"><i class="github icon"></i> GitHub <!-- /.github icon --></a>
                              </div>
                              <!-- /.ui inverted list -->  
                            </div>
                            <!-- /.three wide column -->
                        </div>
                        <!-- /.ui stackable inverted divided equal height grid -->
                    </div>
                    <!-- /.ui container -->
            </div>
            <!-- /.ui vertical stripe segment -->
    </footer>
    <script
			  src="https://code.jquery.com/jquery-3.4.1.min.js"
			  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
			  crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.4.1/semantic.min.js"></script>
    <script type="text/javascript">
    var search = 
    {
        input: function() 
        {
           var elastic = document.getElementById('elastic'); 
        
           elastic.oninput = function() 
           {
                var tr = document.querySelectorAll('.elastic.ul');

                const val = elastic.value.trim();
                //const table = document.querySelector('.ui.inverted.dimmer');

               if (val != '') 
               {   
                        tr.forEach(function (li) { 
                        if (li.innerText.search(val) == -1) 
                        {
                            li.classList.add('hidden');
                             
                            //table.classList.add('active');
                        } else 
                        {
                            li.classList.remove('hidden');
                            //table.classList.remove('active');
                        }
                       
                    });
               } else 
               {
                
                   tr.forEach(function(elem) 
                   {
                       elem.classList.remove('hidden');
                   });
               }   
           }
                

        }, 
      //  insertMask: function(string, stance, value) 
      //  {
            //return string.slice(0, stance) + '<mark>' + string.slice(stance, stance + value) + '</mark>'+ string.slice(stance+value);
       // }
    };

    search.input();

</script>
</body>
</html>