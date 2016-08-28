(function (wnd) {
    var elements = {
        timer: document.getElementById('update_timer'),
        err: document.getElementById('err_div'),
        info_div: document.getElementById('info_div'),
        search_manager: document.getElementById('search_manager'),
        search_manager_div: document.getElementById('search_manager_div'),
        apply_search: document.getElementById('apply_search'),
        table: document.getElementById('rows'),
        soundSwitcher: document.getElementById('play_sound')
    };
    var snd = new Audio('beep.wav');
    var timerObj;
    var prevListing = [];
    var curListing = [];

    wnd.onload = function() {
        var tableRows = prepareTableHeader();
        elements.table.innerHTML += tableRows + '<tr><td colspan="8"><h3>No data loaded</h3></td></tr>';
    };

    elements.apply_search.onclick = performSearch;

    elements.search_manager.onclick = function() {
        $(elements.search_manager_div).toggle(200);
        return false;
    };

    function prepareTableHeader() {
        var tableRows = '';

        tableRows += '<thead><tr><th>Posted</th><th>Ship date</th><th>Path</th>';
        tableRows += '<th>Price</th><th>Phone / Company</th><th>Composite</th>';
        tableRows += '<th>RouteUrl</th><th>Map</th></tr></thead>';
        
        return tableRows;
    }

    function paramedSearch(pickupStates, deliveryStates, vehicleTypeIds) {
        elements.err.innerHTML = '<span>Loading...</span>';
        var tableRows = prepareTableHeader();
        tableRows += '<tr><td colspan="8"><h3> Loading data...</h3></td></tr>';
        elements.table.innerHTML = tableRows;
        $.ajax({
            url: '/proxy.php',
            type: 'post',
            data: {
                paramed: true,
                pickupAreas: pickupStates,
                vehicleTypeIds: vehicleTypeIds,
                deliveryAreas: deliveryStates
            },
            dataType: 'json',
            success: function(retData) {
                var retHtml = parseData(retData);
                date = new Date;
                elements.err.innerHTML = '<span>Last update: ' + date + retHtml + '</span>';
            },
            error: function(err_code) {
                tableRows = prepareTableHeader();
                console.error('Error:',err_code);
                tableRows += '<tr><td colspan="8"><h3>Error loading data...</h3>' + err_code.responseText + '</td></tr>';
                elements.table.innerHTML = tableRows;
                elements.err.innerHTML = '<span>Last update: failed</span>';
            }
        });
    }

    function parseData(data) {
        var trs = prepareTableHeader();
        var hasNew = false;
        var curList;
        data.listings = data.listings.sort(function(a, b) { return a.listingId < b.listingId; });
        /* Process no more than 100 items */
        data.listings.slice(0, 100).forEach(function (curList) {
            trs += '<tr class="jsListingRow largeTableRow';
            if (curList.newListing) {//Last hour's rows
                trs += ' newRow';
                if ($.inArray(curList.listingId, prevListing) < 0) {//New item
                    trs += ' newLoadRow';
                    hasNew = true;
                }
                curListing.push(curList.listingId);
            }

            trs += '"><td>' + curList.modifiedDate + '</td>';
            trs += '<td>' + curList.shipBeginDate + '<br>';
            trs += '<strong>Hours:</strong> ' + curList.hours + '</td>';
            trs += '<td><strong>From:</strong> ' + curList.pickup.city + ' (' + curList.pickup.state + ')';
            if (curList.pickup.zip !== "") {
                trs += ' [' + curList.pickup.zip + ']';
            }
            if (curList.pickup.metro !== null) {
                trs += '<div class="metro">' + curList.pickup.metro + '</div>';
            }
            trs += '<br>';
            trs += '<strong>To:</strong> ' + curList.delivery.city + ' (' + curList.delivery.state + ')';
            if (curList.delivery.zip !== "") {
                trs += ' [' + curList.delivery.zip + ']';
            }
            if (curList.delivery.metro !== null) {
                trs += '<div class="metro">' + curList.delivery.metro + '</div>';
            }
            trs += '</td>';
            trs += '<td>' + curList.priceText + '<br>' + curList.pricePerMile + ' x ' + curList.truckMiles + '</td>';
            trs += '<td><span class="phone">' + curList.phone + '</span><br>' + curList.company + '<br>' + curList.rating + '</td>';
            trs += '<td>' + curList.composite + '</td>';
            trs += '<td>' + curList.routeUrl + '</td>';
            trs += '<td><a href="' + curList.pickup.mapUrl + '" target="blank">Map</a></td></tr>';
        });

        prevListing = curListing.slice();

        elements.table.innerHTML = trs;
        if (hasNew) {
            notify();
            wnd.clearInterval(timerObj);
            console.info('Timer stopped');
            return ' <b>New loads. Stopped. Apply search parameters to start.</i></b>';
        }
        console.info('Timer reloaded');
        return '';
    }

    function notify() {
        
        if (elements.soundSwitcher.checked) {
            console.info('playSound');
            snd.play();
        } else {
            console.info('skip playSound');
        }
    }

    function performSearch() {
        var pickupAreas = [];
        var deliveryAreas = [];
        var vehicleTypeIds = [];
        var pickupText = [];
        var deliveryText = [];
        var vehicleTypeIdsText = [];

        $('#pickup_states_selector option').each(function(i, el) {
            if ($(el).is(':selected')) {
                pickupAreas.push('pickupAreas[]=' + $(el).val());
                pickupText.push($(el).text());
            }
        });
        if (!pickupAreas.length) {
            pickupAreas.push(encodeURIComponent('pickupAreas[]') + '=All');
        }

        $('#delivery_states_selector option').each(function(i, el) {
            if ($(el).is(':selected')) {
                deliveryAreas.push('deliveryAreas[]=' + $(el).val());
                deliveryText.push($(el).text());
            }
        });
        if (!deliveryAreas.length) {
            deliveryAreas.push(encodeURIComponent('deliveryAreas[]') + '=All');
        }

        $('#car_types_selector option').each(function(i, el) {
            if ($(el).is(':selected')) {
                vehicleTypeIds.push('vehicleTypeIds[]=' + $(el).val());
                vehicleTypeIdsText.push($(el).text());
            }
        });
        if (!vehicleTypeIds.length) {
            vehicleTypeIds.push(encodeURIComponent('vehicleTypeIds[]') + '=');
        }

        elements.info_div.innerHTML = '<span><b>From:</b> ' + pickupText.join(', ') + ' <b>';
        elements.info_div.innerHTML += 'To:</b> ' + deliveryText.join(', ') + ' <b>';
        elements.info_div.innerHTML += 'Car types:</b> ' + vehicleTypeIdsText.join(', ') + '</span>';
        paramedSearch(pickupAreas.join('&'), deliveryAreas.join('&'), vehicleTypeIds.join('&'));
        if ('undefined' !== typeof timerObj) {
            wnd.clearInterval(timerObj);
            console.info('Timer reset: ' + (elements.timer.value * 1000));
        }
        timerObj = wnd.setInterval(performSearch, elements.timer.value * 1000);
    }
}(window));