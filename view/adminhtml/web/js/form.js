/**
 * Copyright © 2016 Magento. All rights reserved.
 * See COPYING.txt for license details.
 */ 
require([
    "jquery",
     "mage/validation",
 "mage/calendar"
], 
 function(jQuery){
	  jQuery(document).ready(function(){ 
		   addCal(); 
		   jQuery('form#config-edit-form').submit(function() {
			   
						//For Order number
					 jQuery('form#config-edit-form').find('input[name$="[order_number]"]').each(function() {
						jQuery(this).rules("add", {
							required: true,
							number_with_digit: true,
							messages: {
								required: 'Please enter order number',
								numberwithoutzero: "Please enter only number"
							}
						});
					});
					//For Order amount
					 jQuery('form#config-edit-form').find('input[name$="[order_amount]"]').each(function() {
						jQuery(this).rules("add", {
							required: true,
							number_with_digit: true,
							messages: {
								required: 'Please enter order amount',
								number_with_digit: "Please enter only number"
							}
						});
					});
					//For Order amount
					 jQuery('form#config-edit-form').find('input[name$="[reward_points]"]').each(function() {
						jQuery(this).rules("add", {
							required: true,
							number_with_digit: true,
							messages: {
								required: 'Please enter reward points',
								number_with_digit: "Please enter only number"
							}
						});
					});
					//For Order amount
					 jQuery('form#config-edit-form').find('input[name$="[maximum_number_of_uses]"]').each(function() {
						jQuery(this).rules("add", {
							number_with_digit: true,
							messages: {
								numberwithoutzero: "Please enter only number"
							}
						});
					});
                });      		   
		     
            jQuery( document ).on( 'click', '.action-add', function () {
               addCal();
            });         
                   
		}); 
		
		function addCal(){
			jQuery(".date_pick").calendar({
					buttonText:"<?php echo __('Select Date') ?>",
					dateFormat: "dd-mm-yy",
				});
		}
		jQuery.validator.addMethod("number_only", function (value, element) {
        return this.optional(element) || /^[0-9 ]*$/.test(value);
    }, 'only alphabets allow');
    jQuery.validator.addMethod("number_with_digit", function (value, element) {
        return this.optional(element) || /^[+]?([1-9][0-9]*(?:[\.][0-9]*)?|0*\.0*[1-9][0-9]*)(?:[eE][+-][0-9]+)?$/.test(value);
    }, 'only alphabets allow');
    
     jQuery.validator.addMethod("numberwithoutzero", function (value, element) {
        return this.optional(element) || /^[1-9][0-9]*$/.test(value);
    }, 'only alphabets allow');
});
