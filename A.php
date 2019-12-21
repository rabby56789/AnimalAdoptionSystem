object(MongoDB\Driver\Cursor)#3 (10) 
{ ["database"]=> string(4) "mydb" 
["collection"]=> string(8) "Userinfo" 
["query"]=> object(MongoDB\Driver\Query)#2 (3) 
	{ ["filter"]=> object(stdClass)#4 (2) 
		{ ["account"]=> object(stdClass)#6 (1) { ["$eq"]=> string(13) "123@gmail.com" } 
		  ["psd"]=> object(stdClass)#5 (1) { ["$eq"]=> string(4) "1234" } 
		} 
		["options"]=> object(stdClass)#8 (0) { } 
		["readConcern"]=> NULL } 
		["command"]=> NULL 
		["readPreference"]=> NULL 
		["session"]=> NULL 
		["isDead"]=> bool(false) 
		["currentIndex"]=> int(0) 
		["currentDocument"]=> NULL 
		["server"]=> object(MongoDB\Driver\Server)#7 (10) 
		{ ["host"]=> string(9) "localhost" 
		  ["port"]=> int(27017) 
		  ["type"]=> int(1) 
		  ["is_primary"]=> bool(false) 
		  ["is_secondary"]=> bool(false) 
		  ["is_arbiter"]=> bool(false) 
		  ["is_hidden"]=> bool(false) 
		  ["is_passive"]=> bool(false) 
		  ["last_is_master"]=> array(11) 
		  { ["ismaster"]=> bool(true) 
		  ["maxBsonObjectSize"]=> int(16777216) 
		  ["maxMessageSizeBytes"]=> int(48000000) 
		  ["maxWriteBatchSize"]=> int(100000) 
		  ["localTime"]=> object(MongoDB\BSON\UTCDateTime)#8 (1) 
		  { ["milliseconds"]=> string(13) "1576901076582" } 
		  ["logicalSessionTimeoutMinutes"]=> int(30) 
		  ["connectionId"]=> int(46) 
		  ["minWireVersion"]=> int(0) 
		  ["maxWireVersion"]=> int(8) 
		  ["readOnly"]=> bool(false) 
		  ["ok"]=> float(1) } 
		  ["round_trip_time"]=> int(0) } }
