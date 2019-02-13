var fs = require('fs');

var key = fs.readFileSync('ssl/private.key');
var cert = fs.readFileSync( 'ssl/primary.crt' );
var ca = fs.readFileSync( 'ssl/ca.crt' );

var HTTPoptions = {
  key: key,
  cert: cert,
  ca: ca
};

var express = require('express');
var app = express();
var https = require('https');
var server = https.createServer(HTTPoptions, app);
var io = require('socket.io')(server);
const bodyParser = require('body-parser');
const cors = require('cors')

app.use(cors({credentials: true, origin: true}))
app.use(bodyParser.urlencoded({ extended: true, limit: '50mb' }));
app.use(bodyParser.json({limit: '50mb'}));

var router = express.Router();

router.get('/', function(req, res){
  res.send('Hi iam socket.io server');
});

router.post('/updateCard', function(req, res){
  var word = req.body;
  io.emit('cards', word);
  res.send('Emit OK');
});

io.on('connection', function(socket){
  console.log('a user connected');
  socket.on('chat message', function(msg){
    console.log('message: ' + msg);
    io.emit('chat message', msg);
  });
});

app.use('/api', router);

//app.listen(3001);

console.log('New Portal Socket IO Server is running in port ' + 3001);

server.listen(44301, function(){
  console.log('listening on *:44301');
});

//https.createServer(options, app).listen(44301);