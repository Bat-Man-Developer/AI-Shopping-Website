function executeGetTime() {
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

function executeAjaxGetRequest(endpoint, callback) {
    $.ajax({
        url: endpoint,
        method: 'GET',
        headers: {
            'Content-Type': 'application/json',
            'X-Requested-With': 'XMLHttpRequest',
            'X-XSS-Protection': '1; mode=block',
            'X-Content-Type-Options': 'nosniff',
            'X-Frame-Options': 'DENY',
            'Referrer-Policy': 'no-referrer'
        },
        success: function(response) {
        callback(response);
        },
        error: function(xhr, status, error) {
        console.error(error);
        callback(null);
        }
    });
}

function executeGetSourceAddress(callback) {
    executeAjaxGetRequest('adminserver/networkpackets/getsourceaddress.php', callback);
}

function executeGetDestinationAddress(callback) {
    executeAjaxGetRequest('adminserver/networkpackets/getdestinationaddress.php', callback);
}

function executeGetProtocol(callback) {
    executeAjaxGetRequest('adminserver/networkpackets/getprotocol.php', callback);
}

function executeGetSourcePort(callback) {
    executeAjaxGetRequest('adminserver/networkpackets/getsourceport.php', callback);
}

function executeGetDestinationPort(callback) {
    executeAjaxGetRequest('adminserver/networkpackets/getdestinationport.php', callback);
}

function executeGetLength(callback) {
    executeAjaxGetRequest('adminserver/networkpackets/getlength.php', callback);
}

function generateLineChart(elementId, labels, data, label) {
    var ctx = document.getElementById(elementId).getContext('2d');
    new Chart(ctx, {
        type: 'line',
        data: {
        labels: labels,
        datasets: [{
            label: label,
            data: data,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
        }]
        },
        options: {
        responsive: true,
        maintainAspectRatio: true,
        scales: {
            y: {
            beginAtZero: true
            }
        }
        }
    });
}

$(document).ready(function() {
let sourceIPs = [];
let destinationIPs = [];
let protocols = [];
let sourcePorts = [];
let destinationPorts = [];
let lengths = [];

function updateCharts() {
    executeGetTime();
    executeGetSourceAddress(function(response) {
        if (response) {
            sourceIPs = response.replace(/'/g, "").replace(/ /g, "").split(",");
        }
    });
    executeGetDestinationAddress(function(response) {
        if (response) {
            destinationIPs = response.replace(/'/g, "").replace(/ /g, "").split(",");
        }
    });
    executeGetProtocol(function(response) {
        if (response) {
            protocols = response.replace(/'/g, "").replace(/ /g, "").split(",");
        }
    });
    executeGetSourcePort(function(response) {
        if (response) {
            sourcePorts = response.replace(/'/g, "").replace(/ /g, "").split(",");
        }
    });
    executeGetDestinationPort(function(response) {
        if (response) {
            destinationPorts = response.replace(/'/g, "").replace(/ /g, "").split(",");
        }
    });
    executeGetLength(function(response) {
        if (response) {
            lengths = response.replace(/'/g, "").replace(/ /g, "").split(",");
            generateLineChart("feature1Chart", sourceIPs, lengths, "Packet Lengths");
            generateLineChart("feature2Chart", destinationIPs, lengths, "Packet Lengths");
            generateLineChart("feature3Chart", protocols, lengths, "Packet Lengths");
            generateLineChart("feature4Chart", sourcePorts, lengths, "Packet Lengths");
            generateLineChart("feature5Chart", destinationPorts, lengths, "Packet Lengths");
        }
    });
}

// Initial executions
updateCharts();

// Execute PHP code every 1 second
setInterval(updateCharts, 1000);
});