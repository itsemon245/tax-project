$(document).ready(function () {
    'use strict';

    function fieldLabel($field) {
        return $field.data('wizard-label') || $field.attr('name');
    }

    function validateAppointmentWizard(tab) {
        const $wizard = $(tab).closest('[data-validate-wizard]');

        if (!$wizard.length) {
            return true;
        }

        const $activePane = $wizard.find('.tab-pane.active');
        const missing = [];

        $activePane.find('[required]').each(function () {
            const $field = $(this);

            if (!$field[0].checkValidity()) {
                missing.push(fieldLabel($field));
                $field.addClass('is-invalid');
            } else {
                $field.removeClass('is-invalid');
            }
        });

        if ($activePane.find('[data-wizard-requires-location]').length &&
            $wizard.find('[name="is_physical"]:checked').val() === '1' &&
            !$wizard.find('[name="location"]:checked').length) {
            missing.push('an office location');
        }

        if ($activePane.find('[data-wizard-requires-time]').length &&
            !$wizard.find('[name="time"]:checked').length) {
            missing.push('an available appointment time');
        }

        const $errors = $wizard.find('[data-wizard-errors]');
        const uniqueMissing = [...new Set(missing)];

        if (!uniqueMissing.length) {
            $errors.addClass('d-none').empty();

            return true;
        }

        $errors
            .removeClass('d-none')
            .html('<strong>Please complete the following before continuing:</strong><ul class="mb-0 mt-2"><li>' +
                uniqueMissing.join('</li><li>') +
                '</li></ul>');
        $errors[0].scrollIntoView({ behavior: 'smooth', block: 'center' });

        return false;
    }

    $('#basicwizard').bootstrapWizard();
    $('#progressbarwizard').bootstrapWizard({
        onNext: validateAppointmentWizard,
        onTabClick: function (tab, navigation, currentIndex, clickedIndex) {
            if (!$(tab).closest('[data-validate-wizard]').length || clickedIndex <= currentIndex) {
                return true;
            }

            return clickedIndex === currentIndex + 1 && validateAppointmentWizard(tab);
        },
        onTabShow: function (tab, navigation, index) {
            const progress = (index + 1) / navigation.find('li').length * 100;
            $('#progressbarwizard').find('.bar').css({ width: progress + '%' });
        },
    });
    $('#btnwizard').bootstrapWizard({
        nextSelector: '.button-next',
        previousSelector: '.button-previous',
        firstSelector: '.button-first',
        lastSelector: '.button-last',
    });
    $('#rootwizard').bootstrapWizard({
        onNext: function (tab) {
            const $form = $($(tab).data('targetForm'));

            if ($form && ($form.addClass('was-validated'), $form[0].checkValidity() === false)) {
                event.preventDefault();
                event.stopPropagation();

                return false;
            }
        },
    });
});
