<?php
include('includes/header.php');
?>


<style>

.counter {
    background-color:#F0F8FF;
    padding: 20px 0;
    border-radius: 5px;
}

.count-title {
    font-size: 40px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
    text-align: center;
}

.count-text {
    font-size: 13px;
    font-weight: normal;
    margin-top: 10px;
    margin-bottom: 0;
    text-align: center;
}

.fa-2x {
    margin: 0 auto;
    float: none;
    display: table;
    color: #4ad1e5;
}


</style>


	<div class="container-fluid mt-5 mb-5 pb-5" >
		<div class="row mb-5 mt-5">
			<div class="col-md-12">
				<h1 style="margin-bottom:50px;margin-top:50px;text-align:center;">Our Daily Production</h1>
			</div>
		</div>
		<!--snippets-->
		
		<div class="portal" style="margin-bottom:100px;">
			<div class="row mb-5 mt-5">
				
				
				 <div class="col-md-4">
	        <div class="counter">
     <!-- <i class="fa fa-code fa-2x"></i>-->
      <h2 class="timer count-title count-number" data-to="50" data-speed="1500"></h2>
       <p class="count-text ">Our Clients</p>
    </div>
	        </div>
              <div class="col-md-4">
               <div class="counter">
     <!-- <i class="fa fa-coffee fa-2x"></i>-->
      <h2 class="timer count-title count-number" data-to="47" data-speed="1500"></h2>
      <p class="count-text ">Happy Clients</p>
    </div>
              </div>
              <div class="col-md-4">
                  <div class="counter">
      <!--<i class="fa fa-lightbulb-o fa-2x"></i>-->
      <h2 class="timer count-title count-number" data-to="10000" data-speed="1500"></h2>
      <p class="count-text ">Daily Production in (Kg)</p>
    </div></div>
              <!--<div class="col-md-3">
              <div class="counter">
      <!--<i class="fa fa-bug fa-2x"></i>
      <h2 class="timer count-title count-number" data-to="157" data-speed="1500"></h2>
      <p class="count-text "></p>
    </div>
              </div>-->
				
				
			</div>
		</div>
		
		
		<!--finish snipet-->
	</div>
<?php
include('includes/footer.php');
?>

<script>


(function ($) {
	$.fn.countTo = function (options) {
		options = options || {};
		
		return $(this).each(function () {
			// set options for current element
			var settings = $.extend({}, $.fn.countTo.defaults, {
				from:            $(this).data('from'),
				to:              $(this).data('to'),
				speed:           $(this).data('speed'),
				refreshInterval: $(this).data('refresh-interval'),
				decimals:        $(this).data('decimals')
			}, options);
			
			// how many times to update the value, and how much to increment the value on each update
			var loops = Math.ceil(settings.speed / settings.refreshInterval),
				increment = (settings.to - settings.from) / loops;
			
			// references & variables that will change with each update
			var self = this,
				$self = $(this),
				loopCount = 0,
				value = settings.from,
				data = $self.data('countTo') || {};
			
			$self.data('countTo', data);
			
			// if an existing interval can be found, clear it first
			if (data.interval) {
				clearInterval(data.interval);
			}
			data.interval = setInterval(updateTimer, settings.refreshInterval);
			
			// initialize the element with the starting value
			render(value);
			
			function updateTimer() {
				value += increment;
				loopCount++;
				
				render(value);
				
				if (typeof(settings.onUpdate) == 'function') {
					settings.onUpdate.call(self, value);
				}
				
				if (loopCount >= loops) {
					// remove the interval
					$self.removeData('countTo');
					clearInterval(data.interval);
					value = settings.to;
					
					if (typeof(settings.onComplete) == 'function') {
						settings.onComplete.call(self, value);
					}
				}
			}
			
			function render(value) {
				var formattedValue = settings.formatter.call(self, value, settings);
				$self.html(formattedValue);
			}
		});
	};
	
	$.fn.countTo.defaults = {
		from: 0,               // the number the element should start at
		to: 0,                 // the number the element should end at
		speed: 1000,           // how long it should take to count between the target numbers
		refreshInterval: 100,  // how often the element should be updated
		decimals: 0,           // the number of decimal places to show
		formatter: formatter,  // handler for formatting the value before rendering
		onUpdate: null,        // callback method for every time the element is updated
		onComplete: null       // callback method for when the element finishes updating
	};
	
	function formatter(value, settings) {
		return value.toFixed(settings.decimals);
	}
}(jQuery));

jQuery(function ($) {
  // custom formatting example
  $('.count-number').data('countToOptions', {
	formatter: function (value, options) {
	  return value.toFixed(options.decimals).replace(/\B(?=(?:\d{3})+(?!\d))/g, ',');
	}
  });
  
  // start all the timers
  $('.timer').each(count);  
  
  function count(options) {
	var $this = $(this);
	options = $.extend({}, options || {}, $this.data('countToOptions') || {});
	$this.countTo(options);
  }
});


</script>