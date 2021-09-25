<?php

//echo "Write here switch_case statement with GET['page']";
/* if page=changepwd then call ... */
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'changepwd':
            include 'changepwd.php';
            break;
        /* START: Modules for Master Data */
        case 'app_config':
            include 'update_config.php';
            break;        
       case 'crud_users':
            include 'src/common/crud_users.php';
            break;
       case 'crud_document_master':
            include 'src/common/crud_document_master.php';
            break;
        case 'crud_departments':
            include 'src/hospital_common/crud_departments.php';
            break;        
       case 'crud_tax_master':
            include 'src/accounts/crud_tax_master.php';
            break;
       case 'crud_labtest_master':
            include 'src/laboratory/crud_labtest_master.php';
            break;        
       case 'crud_lab_test_groups':
            include 'src/laboratory/crud_lab_test_groups.php';
            break;         
       case 'crud_med_terms':
            include 'src/hospital_common/crud_med_terms.php';
            break;        
        
        case 'list_roles':
            include 'src/common/list_roles.php';
            break;
        case 'crud_roles':
            include 'src/common/crud_rolemaster.php';
            break;
        case 'list_modules':
            include 'src/common/list_modules.php';
            break;
        case 'crud_modules':
            include 'src/common/crud_modulemaster.php';
            break;
        case 'list_menus':
            include 'src/common/list_menus.php';
            break;        
        case 'crud_menus':
            include 'src/common/crud_menumaster.php';
            break;
        case 'list_events':
            include 'src/events/list_events.php';
            break;        
        case 'crud_events':
            include 'src/events/crud_eventmaster.php';
            break;       
        
        /* MSHMS Specific Pages */
        /**** ADMISSIONS *****************************************/
       
        case 'crud_appointment':
            include 'src/common/crud_appointments.php';
            break; 
        // OPD Related Routing
        case 'new_patient_reg':
            include 'src/admission/new_patient_reg.php';
            break;    
        case 'update_patient_data':
            include 'src/admission/update_patient_data.php';
            break;          
        case 'preexam_patient_data':
            include 'src/admission/preexam_patient_data.php';
            break;             
        case 'update_preexam_data':
            include 'src/admission/update_preexam_data.php';
            break;         
        case 'patient_diagnosis':
            include 'src/admission/patient_diagnosis.php';
            break;  
        
        // IPD Related Routing
        case 'new_ipd_register':
            include 'src/admission/new_ipd_register.php';
            break; 
        case 'save_ipd_registration':
            include 'src/admission/save_ipd_registration.php';
            break;         
        
        
        case 'crud_dashboard':
            include 'src/common/crudpix_dashboard.php';
            break;        
         case 'crud_document_master':
            include 'src/documents/crudpix_document-master.php';
            break;
        case 'crud_tax_master':
            include 'src/extra/crudpix_tax_master.php';
            break;
        case 'crud_lab_test_groups':
            include 'src/extra/crudpix_lab_test_groups.php';
            break; 
        case 'crud_lab_test_master':
            include 'src/extra/crudpix_labtest_master.php';
            break;
        case 'tax_test':
            include 'src/extra/taxtest.php';
            break;  
        
        case 'patient_diagnosis':
            include 'src/admission/patient_diagnosis.php';
            break;  
        
        case 'register_employee':
            include 'src/hr_management/register_employee.php';
            break;  
        
    }
}
else
{
    echo "Router Operation Issue ..<br> ....Check why its not Working!!!!";
}
?>

