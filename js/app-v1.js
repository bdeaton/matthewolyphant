var FineArt = window.FineArt || {};
FineArt.App = FineArt.App || {};
FineArt.App = {
	init: function(){
		//console.log('app init');
		FineArt.App.setupApp();
		
	},	

	
	setupApp:function(){
		console.log('setupApp');
		FineArt.App.getAppData();
		FineArt.App.setupListeners();
		FineArt.App.setupHandlers();
	},
	
	getAppData:function(){
		console.log('getAppData');
		var appDataUrl = 'https://fineart.firebaseio.com/app/';
		var appDataRef = new Firebase(appDataUrl);
		window.AppData = {};
		appDataRef.once('value', function(fbAppData) {
			console.log('value');
			var appData = fbAppData.val();
			console.log(appData);
			window.AppData = appData;
			//FineArt.App.creteTestItem();
			FineArt.App.getPaintings();
		});

	},
	
	getPaintings:function(){
		console.log('getPaintings');
		var appDataUrl = 'https://fineart.firebaseio.com/app/imageData/paintings/';
		var appDataRef = new Firebase(appDataUrl);
		
		appDataRef.once('value', function(fbAppData) {
			console.log('value');
			console.log(fbAppData);
			
			fbAppData.child('items').forEach(function(childSnapshot) {
			  // This code will be called twice.
			  var name = childSnapshot.name();
			  var childData = childSnapshot.val();
			  console.log(childSnapshot.name());
			  
			  
			});
			
			
		});

	},
	
	creteTestItem:function(){

		console.log('getAppData');
		var appDataUrl = 'https://fineart.firebaseio.com/app/imageData/paintings/';
		var appDataRef = new Firebase(appDataUrl);
		
		var peteRef = new Firebase('https://fineart.firebaseio.com/app/imageData/paintings/Pete');
		appDataRef.child("Matt").set({name: {first: 'Matt', last: 'Jones'}});
		appDataRef.child("Peter").setWithPriority({name: {first: 'Pete', last: 'Wolo'}}, 10);
		peteRef.setWithPriority({name: {first: 'Pete', last: 'Wolo'}}, 12);
	
		appDataRef.once('value', function(fbAppData) {
			console.log('value');
			console.log(fbAppData.getPriority());
			var appData = fbAppData.val();
			console.log(appData);
			
			fbAppData.forEach(function(childSnapshot) {
			  // This code will be called twice.
			  var name = childSnapshot.name();
			  var childData = childSnapshot.val();
			  console.log(childSnapshot.getPriority());
			  // name will be 'fred' the first time and 'wilma' the second time.
			  // childData will be the actual contents of the child.
			});
			
			
		});
		
		
	},
	setupListeners:function(){
		console.log('setupListeners');
	},
	
	setupHandlers:function(){
		console.log('setupHandlers');
	}	
};
$(function() {
	FineArt.App.init();
});

