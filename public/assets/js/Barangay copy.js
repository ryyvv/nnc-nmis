
 


// For Economic Service
$(document).ready(function () {

    // If you need to recalculate all rows (e.g., after dynamically adding rows)
    function ESrecalculateAllRows() {
        $("#dataTableES tbody tr").each(function () {
            ESSocialcalculateRowTotal($(this));
        });
        ESupdateCategoryTotals();
        
    }

    // Trigger calculation when any of the inputs are changed
    $("#dataTableES").on("input", 'input[name="ESsourceoffund[]"], input[name="ESpersonel_service[]"], input[name="ESmooe[]"], input[name="EScapital_outlay[]"],  input[name="ESdirect_nutrition_specific[]"],  input[name="ESindirect_nutrition_specific[]"], input[name="ESenabling_mechanism[]"]', function () {
        const row = $(this).closest('tr');    
        ESSocialcalculateRowTotal(row);
        ESupdateCategoryTotals(row);
    });

    function ESSocialcalculateRowTotal(row) {
        let subtotal = 0;
        const EconomicrowpersonelService = parseFloat(row.find('input[name="ESpersonel_service[]"]').val()) || 0;
        const Economicrowmooe = parseFloat(row.find('input[name="ESmooe[]"]').val()) || 0;
        const EconomicrowcapitalOutlay = parseFloat(row.find('input[name="EScapital_outlay[]"]').val()) || 0;
        const Economicrowtotal = EconomicrowpersonelService + Economicrowmooe + EconomicrowcapitalOutlay;

        row.find('input[name="EStotal[]"]').val(Economicrowtotal.toFixed(2));
    }

    function ESupdateCategoryTotals() {

        // Initialize the total variables
        let ESbarangayPersonelServiceTotal = 0, ESbarangayMOOE = 0, ESbarangayCapitalOutlay = 0, ESbarangaytotal = 0, ESbarangayStructure = 0, ESbarangayIN = 0, ESbarangayEM = 0;
        let ESmunicipalPersonelServiceTotal = 0, ESmunicipalMOOE = 0, ESmunicipalCapitalOutlay = 0, ESmunicipaltotal = 0, ESmunicipalStructure = 0, ESmunicipalIN = 0, ESmunicipalEM = 0;
        let ESprovincialPersonelServiceTotal = 0, ESprovincialMOOE = 0, ESprovincialCapitalOutlay = 0, ESprovincialtotal = 0, ESprovincialStructure = 0, ESprovincialIN = 0, ESprovincialEM = 0;
        let ESnationalPersonelServiceTotal = 0, ESnationalMOOE = 0, ESnationalCapitalOutlay = 0, ESnationaltotal = 0, ESnationalStructure = 0, ESnationalIN = 0, ESnationalEM = 0;
        let ESexternalPersonelServiceTotal = 0, ESexternalMOOE = 0, ESexternalCapitalOutlay = 0, ESexternaltotal = 0, ESexternalStructure = 0, ESexternalIN = 0, ESexternalEM = 0;

        // Loop through each row in the table
        $("#dataTableES tbody tr").each(function () {
            const EScategory = $(this).find('select[name="ESsourceoffund[]"]').val();
            const ESpersonelservice = parseFloat($(this).find('input[name="ESpersonel_service[]"]').val()) || 0;
            const ESmooe = parseFloat($(this).find('input[name="ESmooe[]"]').val()) || 0;
            const EScapitaloutlay = parseFloat($(this).find('input[name="EScapital_outlay[]"]').val()) || 0; 
            const EStotal = parseFloat($(this).find('input[name="EStotal[]"]').val()) || 0;
            const ESdirectnutritionspecific = parseFloat($(this).find('input[name="ESdirect_nutrition_specific[]"]').val()) || 0;
            const ESindirectnutritionspecific = parseFloat($(this).find('input[name="ESESindirect_nutrition_specific[]"]').val()) || 0;
            const ESenablingmechanism = parseFloat($(this).find('input[name="ESenabling_mechanism[]"]').val()) || 0;


 

            switch (EScategory) {
                case "barangay":
                    ESbarangayPersonelServiceTotal += ESpersonelservice;
                    ESbarangayMOOE += ESmooe;
                    ESbarangayCapitalOutlay += EScapitaloutlay;
                    ESbarangaytotal += EStotal;
                    ESbarangayStructure += ESdirectnutritionspecific;
                    ESbarangayIN += ESindirectnutritionspecific;
                    ESbarangayEM += ESenablingmechanism;
                    break;
                case "municipal":
                    ESmunicipalPersonelServiceTotal += ESpersonelservice;
                    ESmunicipalMOOE += ESmooe;
                    ESmunicipalCapitalOutlay += EScapitaloutlay;
                    ESmunicipaltotal += EStotal;
                    ESmunicipalStructure += ESdirectnutritionspecific;
                    ESmunicipalIN += ESindirectnutritionspecific;
                    ESmunicipalEM += ESenablingmechanism;
                    break;
                case "provincial":
                    ESprovincialPersonelServiceTotal += ESpersonelservice;
                    ESprovincialMOOE += ESmooe;
                    ESprovincialCapitalOutlay += EScapitaloutlay;
                    ESprovincialtotal += EStotal;
                    ESprovincialStructure += ESdirectnutritionspecific;
                    ESprovincialIN += ESindirectnutritionspecific;
                    ESprovincialEM += ESenablingmechanism;
                    break;
                case "national":
                    ESnationalPersonelServiceTotal += ESpersonelservice;
                    ESnationalMOOE += ESmooe;
                    ESnationalCapitalOutlay += EScapitaloutlay;
                    ESnationaltotal += EStotal;
                    ESnationalStructure += ESdirectnutritionspecific;
                    ESnationalIN += ESindirectnutritionspecific;
                    ESnationalEM += ESenablingmechanism;
                    break;
                case "external":
                    ESexternalPersonelServiceTotal += ESpersonelservice;
                    ESexternalMOOE += ESmooe;
                    ESexternalCapitalOutlay += EScapitaloutlay;
                    ESexternaltotal += EStotal;
                    ESexternalStructure += ESdirectnutritionspecific;
                    ESexternalIN += ESindirectnutritionspecific;
                    ESexternalEM += ESenablingmechanism;
                    break;
                default:
                    break;
            }
        });

        // Set the calculated values in the form fields
        $("#ESPSbarangay").val(ESbarangayPersonelServiceTotal.toFixed(2));
        $("#ESMObarangay").val(ESbarangayMOOE.toFixed(2));
        $("#ESCPbarangay").val(ESbarangayCapitalOutlay.toFixed(2));
        $("#ESTLbarangay").val(ESbarangaytotal.toFixed(2));
        $("#ESSbarangay").val(ESbarangayStructure.toFixed(2));
        $("#ESNbarangay").val(ESbarangayIN.toFixed(2));
        $("#ESEMbarangay").val(ESbarangayEM.toFixed(2));

        $("#ESPSmunicipal").val(ESmunicipalPersonelServiceTotal.toFixed(2));
        $("#ESMOmunicipal").val(ESmunicipalMOOE.toFixed(2));
        $("#ESCPmunicipal").val(ESmunicipalCapitalOutlay.toFixed(2));
        $("#ESTLmunicipal").val(ESmunicipaltotal.toFixed(2));
        $("#ESSmunicipal").val(ESmunicipalStructure.toFixed(2));
        $("#ESNmunicipal").val(ESmunicipalIN.toFixed(2));
        $("#ESEMmunicipal").val(ESmunicipalEM.toFixed(2));

        $("#ESPSprovincial").val(ESprovincialPersonelServiceTotal.toFixed(2));
        $("#ESMOprovincial").val(ESprovincialMOOE.toFixed(2));
        $("#ESCPprovincial").val(ESprovincialCapitalOutlay.toFixed(2));
        $("#ESTLprovincial").val(ESprovincialtotal.toFixed(2));
        $("#ESSprovincial").val(ESprovincialStructure.toFixed(2));
        $("#ESNprovincial").val(ESprovincialIN.toFixed(2));
        $("#ESEMprovincial").val(ESprovincialEM.toFixed(2));

        $("#ESPSnational").val(ESnationalPersonelServiceTotal.toFixed(2));
        $("#ESMOnational").val(ESnationalMOOE.toFixed(2));
        $("#ESCPnational").val(ESnationalCapitalOutlay.toFixed(2));
        $("#ESTLnational").val(ESnationaltotal.toFixed(2));
        $("#ESSnational").val(ESnationalStructure.toFixed(2));
        $("#ESNnational").val(ESnationalIN.toFixed(2));
        $("#ESEMnational").val(ESnationalEM.toFixed(2));

        $("#ESPSexternal").val(ESexternalPersonelServiceTotal.toFixed(2));
        $("#ESMOexternal").val(ESexternalMOOE.toFixed(2));
        $("#ESCPexternal").val(ESexternalCapitalOutlay.toFixed(2));
        $("#ESTLexternal").val(ESexternaltotal.toFixed(2));
        $("#ESSexternal").val(ESexternalStructure.toFixed(2));
        $("#ESNexternal").val(ESexternalIN.toFixed(2));
        $("#ESEMexternal").val(ESexternalEM.toFixed(2));

        // Calculate and set the grand total
        const ESPSGTval = ESbarangayPersonelServiceTotal + ESmunicipalPersonelServiceTotal + ESprovincialPersonelServiceTotal + ESnationalPersonelServiceTotal + ESexternalPersonelServiceTotal;
        const ESMOGTval = ESbarangayMOOE + ESmunicipalMOOE + ESprovincialMOOE + ESnationalMOOE + ESexternalMOOE;
        const ESCPGTval = ESbarangayCapitalOutlay + ESmunicipalCapitalOutlay + ESprovincialCapitalOutlay + ESnationalCapitalOutlay + ESexternalCapitalOutlay;
        const ESTGTval = ESbarangaytotal + ESmunicipaltotal + ESprovincialtotal + ESnationaltotal + ESexternaltotal;
        const ESSGTval = ESbarangayStructure + ESmunicipalStructure + ESprovincialStructure + ESnationalStructure + ESexternalStructure;
        const ESNSGTval = ESbarangayIN + ESmunicipalIN + ESprovincialIN + ESnationalIN + ESexternalIN;
        const ESEMGTval = ESbarangayEM + ESmunicipalEM + ESprovincialEM + ESnationalEM + ESexternalEM;

        $("#ESPSGT").val(ESPSGTval.toFixed(2));
        $("#ESMOGT").val(ESMOGTval.toFixed(2));
        $("#ESCPGT").val(ESCPGTval.toFixed(2));
        $("#ESTGT").val(ESTGTval.toFixed(2));
        $("#ESSGT").val(ESSGTval.toFixed(2));
        $("#ESNSGT").val(ESNSGTval.toFixed(2));
        $("#ESEMGT").val(ESEMGTval.toFixed(2));


    }

    const contentES = [
        // page1
        '<div class="row">' +
        '<div class="col form-group">' +
        '<label class="bold label1" for="field1">AIP Ref. Code</label>' +
        '<input type="text" class="form-control" id="ESaipcode" name="ESaipcode" required>' +
        "</div>" +
        '<div class="col form-group">' +
        '<label class="bold label1" for="field2">Nutrition Typology Code</label>' +
        '<input type="text" class="form-control" id="ESnutrition_topology_code" name="ESnutrition_topology_code" required>' +
        "</div>" +
        "</div>" +
        '<div class="form-group">' +
        '<label class="bold label1" for="field2">Program/Project/Activity Description</label>' +
        '<textarea class="form-control" style="width:100%;border-radius:5px;border: 1px solid #888;max-height:130px;height:130px" name="ESprogram" id="ESprogram"></textarea>' +
        "</div>" +
        '<div class="form-group">' +
        '<label class="bold label1" for="field2">Implementing Agency</label>' +
        '<input type="text" class="form-control"name="ESimplementing_agency" id="ESimplementing_agency"></textarea>' +
        "</div>",

        // page2
        '<label class="bold label1" for="field2">Schedule of Implementation</label>' +
        '<div class="row">' +
        '<div class="col form-group">' +
        '<span class="bold" style="font-size:12px;color:gray">Start Date</span>' +
        '<input type="date" class="form-control" id="ESstartdate" name="ESstartdate" required>' +
        "</div>" +
        '<div class="col form-group">' +
        '<span class="bold" style="font-size:12px;color:gray">Completion Date</span>' +
        '<input type="date" class="form-control" id="EScompletiondate" name="EScompletiondate" required>' +
        "</div>" +
        "</div>" +
        '<div class="form-group">' +
        '<label class="bold label1" for="field2">Expected Output</label>' +
        '<textarea class="form-control" style="width:100%;border-radius:5px;border: 1px solid #888;max-height:130px;height:130px" name="ESexpected_output" id="ESexpected_output"></textarea>' +
        "</div>" +
        '<div class="form-group">' +
        '<label class="bold label1" for="field2">Source of Funds</label>' +
        '<select class="form-control" name="ESsourceoffund"  id="ESsourceoffund">' +
        ' <option  value="">Please select one</option>' +
        '<option value="barangay" >local</option>' +
        '<option value="provincial" >Provincial Government</option>' +
        '<option value="national" >National</option>' +
        '<option value="external" >External</option>' +
        '<option value="municipal" >City/Municipal</option>' +
        '</select>' +
        "</div>",

        // page3
        "<label class='bold label1' for='field2'>Amount (P'000)</label>" +
        '<div class="col form-group">' +
        '<span class="bold" style="font-size:12px;color:gray">Personal Services</label>' +
        '<input type="text" class="form-control" id="ESpersonel_service" name="ESpersonel_service" required>' +
        "</div>" +
        '<div class="col form-group">' +
        '<span class="bold" style="font-size:12px;color:gray">MOOE</label>' +
        '<input type="text" class="form-control" id="ESmooe" name="ESmooe" required>' +
        "</div>" +
        '<div class="col form-group">' +
        '<span class="bold" style="font-size:12px;color:gray">Capital Outlay</label>' +
        '<input type="text" class="form-control" id="EScapital_outlay" name="EScapital_outlay" required>' +
        "</div>" +
        "</div>",

        // page4
        "<div>" +
        '<label class="bold label1" for="field2">Governance and Organizational</label>' +
        '<div class="col form-group">' +
        '<span class="bold" style="font-size:12px;color:gray">Structure</label>' +
        '<input type="text" class="form-control" id="ESdirect_nutrition_specific" name="ESdirect_nutrition_specific" required>' +
        "</div>" +
        '<div class="col form-group">' +
        '<span class="bold" style="font-size:12px;color:gray">Nutrition-sensitive (Indirect)</label>' +
        '<input type="text" class="form-control" id="ESindirect_nutrition_specific" name="ESindirect_nutrition_specific" required>' +
        "</div>" +
        '<div class="col form-group">' +
        '<span class="bold" style="font-size:12px;color:gray">Enabling Mechanisms</label>' +
        '<input type="text" class="form-control" id="ESenabling_mechanism" name="ESenabling_mechanism" required>' +
        "</div>" +
        "</div>",
    ];


    // '<input type="text" class="form-control" id="sourceoffund" name="sourceoffund" required>' +

    let EScurrentPage = 0;
    let ESformData = [];
    let editIndex = null;

    function ESsaveFormData() {
        let pageData = {};

        if (EScurrentPage === 0) {
            pageData = {
                ESaipcode: $("#ESaipcode").val() || "",
                ESnutrition_topology_code: $("#ESnutrition_topology_code").val() || "",
                ESprogram: $("#ESprogram").val() || "",
                ESimplementing_agency: $("#ESimplementing_agency").val() || "",
            };
        } else if (EScurrentPage === 1) {
            pageData = {
                ESstartdate: $("#ESstartdate").val() || "",
                EScompletiondate: $("#EScompletiondate").val() || "",
                ESexpected_output: $("#ESexpected_output").val() || "",
                ESsourceoffund: $("#ESsourceoffund").val() || "",
            };
        } else if (EScurrentPage === 2) {
            pageData = {
                ESpersonel_service: $("#ESpersonel_service").val() || "",
                ESmooe: $("#ESmooe").val() || "",
                EScapital_outlay: $("#EScapital_outlay").val() || "",
                EStotal: $("#EStotal").val() || "",
            };
        } else if (EScurrentPage === 3) {
            pageData = {
                ESdirect_nutrition_specific:
                    $("#ESdirect_nutrition_specific").val() || "",
                ESindirect_nutrition_specific:
                    $("#ESindirect_nutrition_specific").val() || "",
                ESenabling_mechanism: $("#ESenabling_mechanism").val() || "",
            };
        }

        ESformData[EScurrentPage] = pageData;
    }

    function ESupdateContent() {
        $("#modalContentES").html(contentES[EScurrentPage]);

        // Populate fields with existing form data
        if (ESformData[EScurrentPage]) {
            const data = ESformData[EScurrentPage];
            $.each(data, function (key, value) {
                $(`#${key}`).val(value);
            });
        }

        $("#pageIndicatorES").text(
            `Page ${EScurrentPage + 1} of ${contentES.length}`,
        );
        $("#prevPageES").prop("disabled", EScurrentPage === 0);
        $("#nextPageES").prop("disabled", EScurrentPage === contentES.length - 1);
    }

    $("#prevPageES").on("click", function () {
        ESsaveFormData();
        if (EScurrentPage > 0) {
            EScurrentPage--;
            ESupdateContent();
        }
    });

    $("#nextPageES").on("click", function () {
        ESsaveFormData();
        if (EScurrentPage < contentES.length - 1) {
            EScurrentPage++;
            ESupdateContent();
        }
    });

    $("#exampleModalES").on("shown.bs.modal", function () {
        ESupdateContent();
    });


    $("#addToTableES").on("click", function () {
        ESsaveFormData();

        let rowIndex = $("#dataTableES tbody tr").length;
        let newRow = `<tr data-index="${rowIndex}">
            <td>
              <div class="d-flex">
              <i class="fa fa-edit fa-lg cursor editBtnES " style="color:#FFB236;margin-right:10px" title="Edit Disabled"></i>
               <i class="fa fa-trash fa-lg cursor deleteBtn" style="color:RED;margin-right:10px" title="Delete "></i>
              <div> 
            </td>
            <td><input readonly class="inputstyleNone" type="text" name="ESaipcode[]" value="${ESformData[0]?.ESaipcode || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="ESprogram[]" value="${ESformData[0]?.ESprogram || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="ESimplementing_agency[]" value="${ESformData[0]?.ESimplementing_agency || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="ESstartdate[]" value="${ESformData[1]?.ESstartdate || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="EScompletiondate[]" value="${ESformData[1]?.EScompletiondate || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="ESexpected_output[]" value="${ESformData[1]?.ESexpected_output || ""}" required></td>
            <td>
                
                <select  readonly class="inputstyleNone" type="text" name="ESsourceoffund[]">
                <option selected value="">Please select one</option>
                <option value="barangay" ${ESformData[1]?.ESsourceoffund === "barangay" ? "selected" : ""}>Local</option>
                <option value="provincial" ${ESformData[1]?.ESsourceoffund === "provincial" ? "selected" : ""}>Provincial Government</option>
                <option value="national" ${ESformData[1]?.ESsourceoffund === "national" ? "selected" : ""}>National</option>
                <option value="external" ${ESformData[1]?.ESsourceoffund === "external" ? "selected" : ""}>External</option>
                <option value="municipal" ${ESformData[1]?.ESsourceoffund === "municipal" ? "selected" : ""}>City/Municipal</option>
                </select>
            </td>
            <td><input readonly class="inputstyleNone" type="text" name="ESpersonel_service[]" value="${ESformData[2]?.ESpersonel_service || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="ESmooe[]" value="${ESformData[2]?.ESmooe || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="EScapital_outlay[]" value="${ESformData[2]?.EScapital_outlay || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="EStotal[]" value="${ESformData[2]?.EStotal || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="ESdirect_nutrition_specific[]" value="${ESformData[3]?.ESdirect_nutrition_specific || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="ESindirect_nutrition_specific[]" value="${ESformData[3]?.ESindirect_nutrition_specific || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="ESenabling_mechanism[]" value="${ESformData[3]?.ESenabling_mechanism || ""}" required></td>
            <td><input readonly class="inputstyleNone" type="text" name="ESnutrition_topology_code[]" value="${ESformData[0]?.ESnutrition_topology_code || ""}" required></td>
        </tr>`;

        // <td><input readonly class="inputstyleNone" type="text" name="sourceoffund[]" value="${ESformData[1]?.sourceoffund || ""}" required></td>
        $("#spacingES").before(newRow);
        ESformData = [];
        $("#exampleModalES").modal("hide");
        ESrecalculateAllRows();

    });


    $("#dataTableES").on("click", ".deleteBtn", function () {
        const $row = $(this).closest("tr");
        const index = $row.data("index");
        console.log("Delete row index:", index);

        // Remove row from the table
        $row.remove();
        ESrecalculateAllRows();
    });

    let editingRowIndexeditES = null;
    let currentPageeditES = 0;


    const pagesES = [
        // Page 1 contentES
        `<div class="row">
            <div class="col form-group">
                <label for="edit_ESaipcode" class="bold">AIP Ref. Code</label>
                <input type="text" class="form-control" id="edit_ESaipcode" required>
            </div>
            <div class="col form-group">
                <label for="edit_ESnutrition_topology_code" class="bold">Nutrition Typology Code</label>
                <input type="text" class="form-control" id="edit_ESnutrition_topology_code" required>
            </div>
        </div>
        <div class="form-group">
            <label for="edit_ESprogram" class="bold">Program/Project/Activity Description</label>
            <textarea class="form-control" style="width:100%;border-radius:5px;border: 1px solid #888;max-height:130px;height:130px"  id="edit_ESprogram"></textarea>
        </div>
        <div class="form-group">
            <label for="edit_ESimplementing_agency" class="bold">Implementing Agency</label>
            <input type="text" class="form-control" id="edit_ESimplementing_agency" required>
        </div>`,

        // Page2
        `<label class="bold label1" for="field2" class="bold">Schedule of Implementation</label>
            <div class="row">
                '<div class="col form-group"> 
                    <span class="bold" style="font-size:12px;color:gray">Start Date</span>
                    <input type="date" class="form-control" id="edit_ESstartdate"  required>
                </div>
                <div class="col form-group">
                    <span class="bold" style="font-size:12px;color:gray">Completion Date</span>
                <input type="date" class="form-control" id="edit_EScompletiondate" required>
                </div>
            </div>
            <div class="form-group"> 
             <label for="edit_ESexpected_output" class="bold">Expected Output</label>
             <textarea class="form-control" style="width:100%;border-radius:5px;border: 1px solid #888;max-height:130px;height:130px" name="edit_ESexpected_output"  id="edit_ESexpected_output"></textarea>
            </div>
            <div class="form-group"> 
             <label for="edit_ESsourceoffund" class="bold">Source of Funds</label> 
                <select class="form-control" id="edit_ESsourceoffund"> 
                <option value="local">local</option>
                <option value="Provincial Government">Provincial Government</option>
                <option value="National">National</option>
                <option value="External">External</option>
                <option value="City/Municipal">City/Municipal</option>
            </select> 
            </div>
        </div>`,

        // Page 2 contentES
        `<label class='bold label1' for='field2'>Amount (P'000)</label>
        <div class="col form-group">
             <span class="bold" style="font-size:12px;color:gray">Personnel Service</span>
            <input type="text" class="form-control" id="edit_ESpersonel_service" required>
        </div>
        <div class="col form-group">
            <span class="bold" style="font-size:12px;color:gray">MOOE</span>
            <input type="text" class="form-control" id="edit_ESmooe" required>
        </div>
        <div class="col form-group">
            <span class="bold" style="font-size:12px;color:gray">Capital Outlay</span>
            <input type="text" class="form-control" id="edit_EScapital_outlay" required>
        </div>`,

        // Page 3 contentES
        `<label class='bold label1' for='field2'>Governance and Organizational</label>
        <div class="col form-group">
            <span class="bold" style="font-size:12px;color:gray">Direct Nutrition Specific</span>
            <input type="text" class="form-control" id="edit_ESdirect_nutrition_specific" required>
        </div>
        <div class="col form-group">
         <span class="bold" style="font-size:12px;color:gray">Indirect Nutrition Specific</span>
            <input type="text" class="form-control" id="edit_ESindirect_nutrition_specific" required>
        </div>
        <div class="col form-group">
            <span class="bold" style="font-size:12px;color:gray">Enabling Mechanism</span>
            <input type="text" class="form-control" id="edit_ESenabling_mechanism" required>
        </div>`,
    ];


    let modalDataES = {
        ESaipcode: '',
        ESnutrition_topology_code: '',
        ESprogram: '',
        ESimplementing_agency: '',
        ESstartdate: '',
        EScompletiondate: '',
        ESexpected_output: '',
        ESsourceoffund: '',
        ESpersonel_service: '',
        ESmooe: '',
        EScapital_outlay: '',
        ESdirect_nutrition_specific: '',
        ESindirect_nutrition_specific: '',
        ESenabling_mechanism: ''
    };

    function showEditModalES(index) {
        editingRowIndexeditES = index;
        updateEditModalContentES();
        $("#editModalES").modal("show");
    }

    function ESsaveModalPageData() {
        modalDataES.ESaipcode = $("#edit_ESaipcode").val() || modalDataES.ESaipcode;
        modalDataES.ESnutrition_topology_code = $("#edit_ESnutrition_topology_code").val() || modalDataES.ESnutrition_topology_code;
        modalDataES.ESprogram = $("#edit_ESprogram").val() || modalDataES.ESprogram;
        modalDataES.ESimplementing_agency = $("#edit_ESimplementing_agency").val() || modalDataES.ESimplementing_agency;
        modalDataES.ESstartdate = $("#edit_ESstartdate").val() || modalDataES.ESstartdate;
        modalDataES.EScompletiondate = $("#edit_EScompletiondate").val() || modalDataES.EScompletiondate;
        modalDataES.ESexpected_output = $("#edit_ESexpected_output").val() || modalDataES.ESexpected_output;
        modalDataES.ESsourceoffund = $("#edit_ESsourceoffund").val() || modalDataES.ESsourceoffund;
        modalDataES.ESpersonel_service = $("#edit_ESpersonel_service").val() || modalDataES.ESpersonel_service;
        modalDataES.ESmooe = $("#edit_ESmooe").val() || modalDataES.ESmooe;
        modalDataES.EScapital_outlay = $("#edit_EScapital_outlay").val() || modalDataES.EScapital_outlay;
        modalDataES.total = $("#edit_total").val() || modalDataES.total;
        modalDataES.ESdirect_nutrition_specific = $("#edit_ESdirect_nutrition_specific").val() || modalDataES.ESdirect_nutrition_specific;
        modalDataES.ESindirect_nutrition_specific = $("#edit_ESindirect_nutrition_specific").val() || modalDataES.ESindirect_nutrition_specific;
        modalDataES.ESenabling_mechanism = $("#edit_ESenabling_mechanism").val() || modalDataES.ESenabling_mechanism;
    }

    function updateEditModalContentES() {
        $("#editModalContentES").html(pagesES[currentPageeditES]);

        // Populate fields with modal data 
        $.each(modalDataES, function (key, value) {
            $(`#edit_${key}`).val(value);
        });

        $("#pageIndicatorEditES").text(`Page ${currentPageeditES + 1} of ${pagesES.length}`);
        $("#prevPageEditES").prop("disabled", currentPageeditES === 0);
        $("#nextPageEditES").prop("disabled", currentPageeditES === pagesES.length - 1);
    }

    $("#dataTableES").on("click", ".editBtnES ", function () {
        const index = $(this).closest("tr").data("index");

        // Load existing data into modalDataES for editing
        const row = $(`#dataTableES tbody tr[data-index="${index}"]`);
        modalDataES = {
            ESaipcode: row.find('input[name="ESaipcode[]"]').val(),
            ESnutrition_topology_code: row.find('input[name="ESnutrition_topology_code[]"]').val(),
            ESprogram: row.find('input[name="ESprogram[]"]').val(),
            ESimplementing_agency: row.find('input[name="ESimplementing_agency[]"]').val(),
            ESstartdate: row.find('input[name="ESstartdate[]"]').val(),
            EScompletiondate: row.find('input[name="EScompletiondate[]"]').val(),
            ESexpected_output: row.find('input[name="ESexpected_output[]"]').val(),
            ESsourceoffund: row.find('input[name="ESsourceoffund[]"]').val(),
            ESpersonel_service: row.find('input[name="ESpersonel_service[]"]').val(),
            ESmooe: row.find('input[name="ESmooe[]"]').val(),
            EScapital_outlay: row.find('input[name="EScapital_outlay[]"]').val(),
            total: row.find('input[name="total[]"]').val(),
            ESdirect_nutrition_specific: row.find('input[name="ESdirect_nutrition_specific[]"]').val(),
            ESindirect_nutrition_specific: row.find('input[name="ESindirect_nutrition_specific[]"]').val(),
            ESenabling_mechanism: row.find('input[name="ESenabling_mechanism[]"]').val(),
        };

        showEditModalES(index);
    });

    $("#prevPageEditES").click(function () {
        if (currentPageeditES > 0) {
            ESsaveModalPageData();
            currentPageeditES--;
            updateEditModalContentES();
        }
    });

    $("#nextPageEditES").click(function () {
        if (currentPageeditES < pagesES.length - 1) {
            ESsaveModalPageData();
            currentPageeditES++;
            updateEditModalContentES();
        }
    });

    $("#saveChanges").click(function () {
        ESsaveModalPageData(); // Ensure the last page's data is saved

        const row = $(`#dataTableES tbody tr[data-index="${editingRowIndexeditES}"]`);
        $.each(modalDataES, function (key, value) {
            row.find(`input[name="${key}[]"]`).val(value);
        });

        $("#editModal").modal("hide");

        ESrecalculateAllRows();
    });
});