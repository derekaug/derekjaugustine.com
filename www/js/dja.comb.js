var dja = {
    "init": function (page) {
        var self = this;
        self.tplMessage = $('#tplMessage').html();
        // page setup
        switch (page) {
            case "email":
                self.$buttonSubmit = $('#buttonSubmit');
                self.$formEmail = $('#formEmail');
                self.$divMessages = $('#divMessages');
                self.$inputName = $('#inputName');
                self.$inputEmail = $('#inputEmail');
                self.$textareaBody = $('#textareaBody');
                self.$inputOutput = self.$formEmail.find('input[name="output"]');
                self.$inputRedirect = self.$formEmail.find('input[name="redirect"]');

                self.$inputOutput.data('original', self.$inputOutput.val());
                self.$inputRedirect.data('original', self.$inputRedirect.val());

                self.$formEmail.on('submit', $.proxy(self.emailSubmit, self));

                if (GLOBALS.data && GLOBALS.data.messages) {
                    self.showMessages(GLOBALS.data.messages, self.$divMessages);
                }
                break;
        }
    },

    "showMessages": function (messages, $container) {
        var self = this;
        $container.empty();
        $.each(messages, function (i, v) {
            $container.append(Mustache.render(self.tplMessage, v));
        });
    },

    /**
     * checks to see current state on the element (button/anchor)
     * @param $element
     * @returns {boolean}
     */
    "isLoading": function ($element) {
        return $element.attr('disabled') === true;
    },

    "setLoading": function (value, $element) {
        $element.attr('disabled', value);
    },

    "clearForm": function () {
        var self = this;
        self.$inputEmail.val('');
        self.$inputName.val('');
        self.$textareaBody.val('');
    },

    "emailSubmit": function (e) {
        e.preventDefault();

        var self = this;

        if (!self.isLoading(self.$buttonSubmit)) {
            self.setLoading(true, self.$buttonSubmit);
            self.$inputOutput.val('json');
            self.$inputRedirect.val(null);
            $.ajax({
                'url'     : self.$formEmail.attr('action'),
                'type'    : self.$formEmail.attr('method'),
                'data'    : self.$formEmail.serialize(),
                'dataType': 'json',
                'success' : function (data) {
                    self.showMessages(data.messages, self.$divMessages);
                    if(data.success){
                        self.clearForm();
                    }
                },
                'error'   : function () {

                },
                'complete': function () {
                    self.setLoading(false, self.$buttonSubmit);
                    self.$inputOutput.val(self.$inputOutput.data('original'));
                    self.$inputRedirect.val(self.$inputRedirect.data('original'));
                }
            });

        }
    }
};