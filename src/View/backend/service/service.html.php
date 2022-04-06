<h2>service backend</h2>

<?php
    if (isset($form)) {
        $form->messages();

        $form->open('service', 'form-service', '/admin/services/add');
            $form->text('name','Nom','','','','[Entrer le nom du service]');
            $form->text('description','Description','','','','[Entrer le description]');
            $form->text('slug','Slug','','','','[Entrer le slug]');
            $form->submit_button('Submit Form');
        $form->open();
    }
?>

<?php
    if (isset($services) && count($services)) {
        foreach ($services as $service) {
            include FOLDER_VIEW.'/backend/service/resum-service.html.php';
        }
    }
?>

