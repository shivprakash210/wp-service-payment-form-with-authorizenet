(function($){
    $('#doaction, #doaction2').on('click', function() {
        var action = ('doaction' === this.id) ? $('#bulk-action-selector-top').val() : $('bulk-action-selector-bottom').val();
        if( "-1" === action ){
            alert('Please select an action.');
            return false;
        }
        else if( 'delete' === action ) {
            return confirm('Permanently delete the selected items?');
        }
    });
})(jQuery);
