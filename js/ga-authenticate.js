// Load the Google data JavaScript client library.
google.load('gdata', '1.x', {
    packages: ['analytics']
});

// Set the callback function when the library is ready.
google.setOnLoadCallback(init);

/**
 * This is called once the Google Data JavaScript library has been loaded.
 * It creates a new AnalyticsService object, adds a click handler to the
 * authentication button and updates the button text depending on the status.
 */
function init() {
    myService = new google.gdata.analytics.AnalyticsService('gaExportAPI_acctSample_v1.0');
    scope = 'https://www.google.com/analytics/feeds';
    var button = document.getElementById('authButton');

    // Add a click handler to the Authentication button.
    button.onclick = function() {
        // Test if the user is not authenticated.
        if (!google.accounts.user.checkLogin(scope)) {
            // Authenticate the user.
            google.accounts.user.login(scope);
        } else {
            // Log the user out.
            google.accounts.user.logout();
            getStatus();
        }
    }
    getStatus();
}

/**
 * Utility method to display the user controls if the user is 
 * logged in. If user is logged in, get Account data and
 * get Report Data buttons are displayed.
 */
function getStatus() {
    var getAccountButton = document.getElementById('getAccount');
    getAccountButton.onclick = getAccountFeed;
  
    var getDataButton = document.getElementById('getData');
    getDataButton.onclick = getDataFeed;

    var dataControls = document.getElementById('dataControls');
    var loginButton = document.getElementById('authButton');
    if (!google.accounts.user.checkLogin(scope)) {
        dataControls.style.display = 'none';   // hide control div
        loginButton.innerHTML = 'Access Google Analytics';
    } else {
        dataControls.style.display = 'block';  // show control div
        loginButton.innerHTML = 'Logout';
    }
}

/**
 * Main method to get account data from the API.
 */
function getAccountFeed() {
    var myFeedUri =
    'https://www.google.com/analytics/feeds/accounts/default?max-results=50';
    myService.getAccountFeed(myFeedUri, handleAccountFeed, handleError);
}

/**
 * Handle the account data returned by the Export API by constructing the inner parts
 * of an HTML table and inserting into the HTML file.
 * @param {object} result Parameter passed back from the feed handler.
 */

//var for holding info about the selected profile ID
var profileID;

function handleAccountFeed(result) {
    // An array of analytics feed entries.
    var entries = result.feed.getEntries();

    // Create an HTML Table using an array of elements.
    var outputTable = ['<table><tr>',
    '<th>Account Name</th>',
    '<th>Profile Name</th>',
    '<th>Profile ID</th>',
    '<th>Table Id</th></tr>'];

    // Iterate through the feed entries and add the data as table rows.
    for (var i = 0, entry; entry = entries[i]; ++i) {

        // Add a row in the HTML Table array for each value.
        var row = [
        entry.getPropertyValue('ga:AccountName'),
        entry.getTitle().getText(),
        entry.getPropertyValue('ga:ProfileId'),
        entry.getTableId().getValue()
        ].join('</td><td>');
        outputTable.push('<tr><td>', row, '</td><td id="profile'+i+'">'+entry.getPropertyValue('ga:ProfileId')+
            '</td><td><button onclick="setProfileID('+i+')">Select this profile</button></td></tr>');
    }
    outputTable.push('</table>');

    // Insert the table into the UI.
    document.getElementById('outputDiv').innerHTML =
    outputTable.join('');
}

function setProfileID(id){
    var profile = document.getElementById('profile'+id);
    profileID = 'ga:'+profile.firstChild.nodeValue;
    document.getElementById('outputDiv').innerHTML = profileID;
}

/**
 * Main method to get report data from the Export API.
 */
function getDataFeed() {
    var myFeedUri = 'https://www.google.com/analytics/feeds/data' +
    '?start-date=2009-04-01' +
    '&end-date=2009-04-30' +
    '&dimensions=ga:pageTitle,ga:pagePath' +
    '&metrics=ga:pageviews' +
    '&sort=-ga:pageviews' +
    '&max-results=10' +
    '&ids=' + profileID;
  
    myService.getDataFeed(myFeedUri, handleDataFeed, handleError);
}

/**
 * Handle the data returned by the Export API by constructing the 
 * inner parts of an HTML table and inserting into the HTML File.
 * @param {object} result Parameter passed back from the feed handler.
 */
function handleDataFeed(result) {
 
    // An array of Analytics feed entries.
    var entries = result.feed.getEntries();
 
    // Create an HTML Table using an array of elements.
    var outputTable = ['<table><tr>',
    '<th>Page Title</th>',
    '<th>Page Path</th>',
    '<th>Pageviews</th></tr>'];

    // Iterate through the feed entries and add the data as table rows.
    for (var i = 0, entry; entry = entries[i]; ++i) {

        // Add a row in the HTML Table array.
        var row = [
        entry.getValueOf('ga:pageTitle'),
        entry.getValueOf('ga:pagePath'),
        entry.getValueOf('ga:pageviews')
        ].join('</td><td>');
        outputTable.push('<tr><td>', row, '</td></tr>');
    }
    outputTable.push('</table>');

    // Insert the table into the UI.
    document.getElementById('outputDiv').innerHTML =
    outputTable.join('');
}

/**
 * Alert any errors that come from the API request.
 * @param {object} e The error object returned by the Analytics API.
 */
function handleError(e) {
    var error = 'There was an error!\n';
    if (e.cause) {
        error += e.cause.status;
    } else {
        error.message;
    }
    alert(error);
}
