var dja = {
    "init": function (page) {
        var self = this;

        switch (page) {
            case "email":
                self.$buttonSubmit = $('#buttonSubmit');
                self.$formEmail = $('#formEmail');
                self.$inputOutput = self.$formEmail.find('input[name="output"]');
                self.$inputRedirect = self.$formEmail.find('input[name="redirect"]');

                self.$inputOutput.data('original', self.$inputOutput.val());
                self.$inputRedirect.data('original', self.$inputRedirect.val());

                self.$formEmail.on('submit', $.proxy(self.emailSubmit, self));
                break;
        }
    },

    "isLoading": function ($element) {
        return $element.attr('disabled') === true;
    },

    "setLoading": function (value, $element) {
        $element.attr('disabled', value);
    },

    "emailSubmit": function (e) {
        e.preventDefault();

        var self = this;

        if (!self.isLoading(self.$buttonSubmit)) {
            self.setLoading(true, self.$buttonSubmit);
            self.$inputOutput.val('json');
            self.$inputRedirect.val(null);
            $.ajax({
                'url': self.$formEmail.attr('action'),
                'type': self.$formEmail.attr('method'),
                'data': self.$formEmail.serialize(),
                'dataType': 'json',
                'success': function(data){

                },
                'error': function(){

                },
                'complete': function(){
                    self.setLoading(false, self.$buttonSubmit);
                    self.$inputOutput.val(self.$inputOutput.data('original'));
                    self.$inputRedirect.val(self.$inputRedirect.data('original'));
                }
            });

        }
    }
};