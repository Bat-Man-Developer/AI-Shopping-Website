function executeGetTime(){
    $.ajax({
        url: 'adminserver/networkpackets/gettime.php',
        method: 'GET',
        success: function(response) {
            $('#localnetworktraffictime').html(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
function executeGetSourceAddress(){
    $.ajax({
        url: 'adminserver/networkpackets/getsourceaddress.php',
        method: 'GET',
        success: function(response) {
            $('#sourceIPs').html(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
function executeGetDestinationAddress(){
    $.ajax({
        url: 'adminserver/networkpackets/getdestinationaddress.php',
        method: 'GET',
        success: function(response) {
            $('#destinationIPs').html(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
function executeGetProtocol(){
    $.ajax({
        url: 'adminserver/networkpackets/getprotocol.php',
        method: 'GET',
        success: function(response) {
            $('#protocols').html(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
function executeGetSourcePort(){
    $.ajax({
        url: 'adminserver/networkpackets/getsourceport.php',
        method: 'GET',
        success: function(response) {
            $('#sourcePorts').html(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
function executeGetDestinationPort(){
    $.ajax({
        url: 'adminserver/networkpackets/getdestinationport.php',
        method: 'GET',
        success: function(response) {
            $('#destinationPorts').html(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}
function executeGetLength(){
    $.ajax({
        url: 'adminserver/networkpackets/getlength.php',
        method: 'GET',
        success: function(response) {
            $('#lengths').html(response);
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
}

$(document).ready(function(){
  // Initial executions
  executeGetTime();
  executeGetSourceAddress();
  executeGetDestinationAddress();
  executeGetProtocol();
  executeGetSourcePort();
  executeGetDestinationPort();
  executeGetLength();

  // Execute PHP code every 5 seconds
  setInterval(function(){
    executeGetTime();
    executeGetSourceAddress();
    executeGetDestinationAddress();
    executeGetProtocol();
    executeGetSourcePort();
    executeGetDestinationPort();
    executeGetLength();
  }, 1000);
});