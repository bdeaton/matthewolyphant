var Matt = window.Matt || {}; Matt.Gallery = Matt.Gallery || {};
Matt.Gallery = {
	trackBaseUrl:'/Matt/getTracks.php',
    trackUrl:'/Matt/getTracks.php',
    init: function(){
    	console.log('Matt.Gallery.init');
    	if($('body').hasClass('gallery-height')){
			Matt.Gallery.setHandlers();
			Matt.Gallery.fixMargins();
		}
		Matt.Gallery.galleryView.init();
    },
    setHandlers: function(){
    	console.log('Matt.Gallery.setHandlers');
    	$(window).resize(function(){
			Matt.Gallery.resetLayout();
		});
    },
    resetLayout: function(){
		var $list = $('.gallery-main ul');
		var $items = $list.find('li');
		$items.not('li.row-item-first').css('margin-left','14px');
		$items.attr('class','').attr('style','');
		Matt.Gallery.fixMargins();
    },
    fixMargins:function(){
    	console.log('Matt.Gallery.fixMargins');
		//console.clear();
		var rows = [];
		
		var $list = $('.gallery-main ul');
		var $items = $list.find('li');
		var listWidth = $list.outerWidth();
		var count = $items.length;
		
		var rowCount = 1;
		var currentOffset = 0;
		var newOffset = 0;
		$items.each(function(index,item){
		
				var offset = $(item).offset();
				var top = offset.top;
				if(index==0){
					rowCount = 1;
					rows.push(rowCount);
				}
				else{
					if(top!=newOffset){
						rowCount += 1;
						rows.push(rowCount);
					}
				}
				newOffset = top;
				var className = 'row-'+rowCount;
				$(item).addClass(className);
			   // console.log(index + ' - ' + top + ' - ' + className);
		
				
			
		});
		
		
		
		console.log('listWidth',listWidth);
		//console.log(count);
		console.log(rows);
		console.log(' ');
		console.log(' ');
		
		
		
		
		//for (var i=1;i<rows.length;i++){ 
		//for (var i=0;i<2;i++){ 
		
		$.each(rows,function(i,arrayItem){
			console.log(i,arrayItem);
			
			var selector = 'li.row-' + arrayItem;
			var $rowItems = $list.find(selector);
			var rowItemsCount = $rowItems.length;
			console.log('selector',selector);
			console.log('rowItemsCount',rowItemsCount);
			console.log('---------------');
			
			var itemsTotalWidth = 0;
			$rowItems.each(function(index,item){
				var $item = $(item);
				if(index==0){
					$item.addClass('row-item-first');
				}
				var itemWidth = $item.outerWidth();
				itemsTotalWidth += itemWidth;
				console.log(index + ' itemWidth',itemWidth);
				
			});
			var widthDiff = listWidth - itemsTotalWidth;
			var marginEach = (widthDiff/(rowItemsCount-1));
		//    rowItemsCount
			$rowItems.not('li.row-item-first').css('margin-left',marginEach+'px');
			
			console.log('itemsTotalWidth',itemsTotalWidth);
			console.log('widthDiff',widthDiff);
			console.log('marginEach',marginEach);
			console.log(' ');
		});
		
		$items.css('visibility','visible');

    },
    galleryView:{
		init: function(){
			console.log('Matt.Gallery.galleryView.init');
			Matt.Gallery.galleryView.setupHandlers();
		},
		setupHandlers: function(){
			console.log('Matt.Gallery.galleryView.setupHandlers');
			$('.gallery-main a').on('click',function(){
				Matt.Gallery.galleryView.handleClickThumbnail($(this));
				return false;	
			});
			Matt.Gallery.galleryView.setupPagination();
		},
		setupPagination: function(){
			console.log('Matt.Gallery.galleryView.setupPagination');
			$('#gallery-large a.gallery-large-pagination.pagination-previous').on('click',function(){
				if(!$(this).hasClass('disabled')){
					Matt.Gallery.galleryView.handlePagination($(this),'previous');
				}
				return false;
			});
			$('#gallery-large a.gallery-large-pagination.pagination-next').on('click',function(){
				if(!$(this).hasClass('disabled')){
					Matt.Gallery.galleryView.handlePagination($(this),'next');
				}
				return false;
			});
		},
		handlePagination: function($this,type){
			
			var $img = $('#gallery-large img');
			var currentIndex = parseInt($img.attr('data-index'));
			var length = $('.gallery-main li').length;
			console.log(currentIndex);
			console.log(length);
			$('#gallery-large').find('.pagination-previous,.pagination-next').removeClass('disabled');
			
			if(type=='open'){
				if(currentIndex==1){
					$('#gallery-large a.gallery-large-pagination.pagination-previous').addClass('disabled');
				}
				if(currentIndex==length){
					$('#gallery-large a.gallery-large-pagination.pagination-next').addClass('disabled');
				}
			}
			else{
				$('#gallery-large').dialog('close');
				var newIndex = currentIndex+1;
				$('#gallery-large').removeClass('image-first').removeClass('image-last');
				
				
				if(type=='previous'){
					newIndex = currentIndex-1;
				}
				if(type=='previous'||type=='next'){
					$('.gallery-main li[data-index=' + newIndex + '] a').click();
				}
				
				if(newIndex==1){
					$this.addClass('disabled');
				}
				if(newIndex==length){
					$this.addClass('disabled');
				}
			}
		},
		handleClickThumbnail: function($this){
			console.log('Matt.Gallery.galleryView.handleClickThumbnail');
			$this.css('outline','1px solid green');
			
			$('#gallery-large img').remove();
			
			var url = $this.attr('href');
			url = 'gallery-large.html';
			url = 'img/artwork/installations/large/Matthew-Olyphant-Taxi-Painting-2010.jpg';
			var imgUrl = $this.attr('href');
			var index = $this.attr('data-index');
			var title = $this.find('img').attr('title');
			
			//imgUrl = 'img/artwork/installations/large/Matthew-Olyphant-Taxi-Painting-2010.jpg';
			var $dialog = $('#gallery-large');
			
			var width = $this.attr('data-width');
			var height = $this.attr('data-height');
			var paddingWidth = 25;
			var paddingHeight = 25;
			var windowWidth = $(window).width();
			var windowHeight = $(window).height();
			
			var imageWidth = width;
			var imageHeight = height;
			
			var maxWidth = windowWidth - (paddingWidth*2);
			var maxHeight = windowHeight - (paddingHeight*2);
			var orientation = 'square';
			var divisor = 1;
			if(width>height){
				orientation = 'landscape';
				divisor = maxHeight/height;
			}
			else{
				divisor = maxHeight/height;
				orientation = 'portrait';
			}
			imageWidth = width*divisor;
			imageHeight = height*divisor;
			

			
			
			var output = '';
			output += 'windowWidth: ' + windowWidth + '\n';
			output += 'windowHeight: ' + windowHeight + '\n';
			output += '\n';
			output += 'maxWidth: ' + maxWidth + '\n';
			output += 'maxHeight: ' + maxHeight + '\n';
			output += '\n';
			output += 'width: ' + width + '\n';
			output += 'height: ' + height + '\n';
			output += '\n';
			output += 'orientation: ' + orientation + '\n';
			output += 'divisor: ' + divisor + '\n';
			output += '\n';
			output += 'imageWidth: ' + imageWidth + '\n';
			output += 'imageHeight: ' + imageHeight + '\n';
			
			var newImage = '<img src="' + imgUrl + '" data-index="' + index + '" alt="' + title + '" title="' + title + '" />';
			$('#gallery-large').append(newImage).find('img').css({
				'width':imageWidth,
				'height':imageHeight
			});
			/*
			$('#gallery-large img').attr('src',imgUrl).attr('data-index',index).css({
				'width':imageWidth,
				'height':imageHeight
			});
			*/
			
			
			console.log(output);

			/*
			$.ajax({
				url: url,
				success: function(data){
					$dialog.html(data);
				}   
			});
			$dialog.html('<img src="' + url + '" width="500" height="500" alt="test" />');
			*/
			Matt.Gallery.galleryView.handlePagination($this,'open');
			$('#gallery-large').dialog({
				autoOpen: false,
				modal: true,
				resizable:false,
				draggable:false,
				width:imageWidth,
				height:imageHeight,
				center:true,
				position:'center'
			});
			$('#gallery-large').dialog('open');
			
			$('.ui-widget-overlay').on('click',function(){
				$('#gallery-large').dialog('close');
				return false;	
			});
			
			console.log('Matt.Gallery.galleryView.handleClickThumbnail after');
		}
		
	}
};
Matt.Gallery.init();

