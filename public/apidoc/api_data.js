define({ "api": [
  {
    "type": "post",
    "url": "admin/login",
    "title": "Login User",
    "name": "Login_User",
    "version": "1.1.1",
    "group": "Admin_Auth",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Password</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/login"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auth/AuthController.php",
    "groupTitle": "Admin_Auth"
  },
  {
    "type": "post",
    "url": "admin/logout",
    "title": "Logout User",
    "name": "Logout_User",
    "version": "1.1.1",
    "group": "Admin_Auth",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/logout"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auth/AuthController.php",
    "groupTitle": "Admin_Auth"
  },
  {
    "type": "delete",
    "url": "admin/delete-auto/{id}",
    "title": "Delete  auto by id",
    "name": "Delete_auto_by_id",
    "version": "1.1.1",
    "group": "Admin_Auto_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/delete-auto/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auto/AutoController.php",
    "groupTitle": "Admin_Auto_Action"
  },
  {
    "type": "post",
    "url": "admin/delete-auto-document/{id}",
    "title": "Delete document  auto by id",
    "name": "Delete_document_auto_by_id",
    "version": "1.1.1",
    "group": "Admin_Auto_Action",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "ids",
            "description": "<p>Delete ids</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/delete-auto-document/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auto/AutoController.php",
    "groupTitle": "Admin_Auto_Action"
  },
  {
    "type": "post",
    "url": "admin/delete-auto",
    "title": "Multiple Delete Auto",
    "name": "Multiple_Delete_Auto",
    "version": "1.1.1",
    "group": "Admin_Auto_Action",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "auto_id",
            "description": "<p>Array of Autos ID</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/delete-auto"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auto/AutoController.php",
    "groupTitle": "Admin_Auto_Action"
  },
  {
    "type": "post",
    "url": "admin/restore-auto-document/{id}",
    "title": "Restore document  auto by id",
    "name": "Restore_document_auto_by_id",
    "version": "1.1.1",
    "group": "Admin_Auto_Action",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "document",
            "description": "<p>Document</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/restore-auto-document/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auto/AutoController.php",
    "groupTitle": "Admin_Auto_Action"
  },
  {
    "type": "get",
    "url": "admin/get-autos",
    "title": "Show all autos",
    "name": "Show_all_autos",
    "version": "1.1.1",
    "group": "Admin_Auto_Action",
    "description": "<p>(client_id - for all autos byclient, countpage - for set Item PerPage, order_type - (asc, desc), order_by - column name for sort, search - for search by (vin_code))</p>",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-autos"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auto/AutoController.php",
    "groupTitle": "Admin_Auto_Action"
  },
  {
    "type": "get",
    "url": "admin/get-autos-by-container",
    "title": "Show all autos by container",
    "name": "Show_all_autos_by_container",
    "version": "1.1.1",
    "group": "Admin_Auto_Action",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "tracking_id",
            "description": "<p>Tracking or Container ID</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-autos-by-container"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auto/AutoController.php",
    "groupTitle": "Admin_Auto_Action"
  },
  {
    "type": "get",
    "url": "admin/get-auto/{id}",
    "title": "Show  auto by id",
    "name": "Show_auto_by_id",
    "version": "1.1.1",
    "group": "Admin_Auto_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-auto/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auto/AutoController.php",
    "groupTitle": "Admin_Auto_Action"
  },
  {
    "type": "post",
    "url": "admin/store-auto",
    "title": "Store Auto",
    "name": "Store_Auto",
    "version": "1.1.1",
    "group": "Admin_Auto_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "year",
            "description": "<p>Year</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "make_name",
            "description": "<p>Make name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "model_name",
            "description": "<p>Model name</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "client_id",
            "description": "<p>Client id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Status (new, not_approved, pending, delivered)</p>"
          },
          {
            "group": "Parameter",
            "type": "Boolean",
            "optional": false,
            "field": "offsite",
            "description": "<p>Offsite (1- true, 0 - false)</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "offsite_price",
            "description": "<p>Offsite Price</p>"
          },
          {
            "group": "Parameter",
            "type": "Date",
            "optional": false,
            "field": "purchased_date",
            "description": "<p>Purchased Date</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "ship",
            "description": "<p>Ship block has or has not</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "tracking_id",
            "description": "<p>Tracking id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "container_id",
            "description": "<p>Container id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "point_load_city",
            "description": "<p>Point load city</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "point_load_date",
            "description": "<p>Point load date</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "point_delivery_city",
            "description": "<p>Point delivery city</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "point_delivery_date",
            "description": "<p>Point delivery date</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "disassembly",
            "description": "<p>Disassembly Exp - 1 true, 0 - false</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "lot",
            "description": "<p>Lot block has or has not</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lot_number",
            "description": "<p>Lot Number</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "doc_type",
            "description": "<p>Document type</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "odometer",
            "description": "<p>Odometer</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "highlight",
            "description": "<p>Highlight</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "pri_damage",
            "description": "<p>Primary damage</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "sec_damage",
            "description": "<p>Secondary damage</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "ret_value",
            "description": "<p>Retail value</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "vin_code",
            "description": "<p>Vin code</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "sale",
            "description": "<p>Sale block has or has not</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "location",
            "description": "<p>Location</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "grid_item",
            "description": "<p>Grid item</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "sale_name",
            "description": "<p>Saller name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "ret_date",
            "description": "<p>Retail date</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "feature",
            "description": "<p>Feature block has or has not</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "body_style",
            "description": "<p>Body style</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "color",
            "description": "<p>Color</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "eng_type",
            "description": "<p>Engine type</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "cylinder",
            "description": "<p>Cylinder</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "trans",
            "description": "<p>Transmission</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "drive",
            "description": "<p>Drive</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "fuel",
            "description": "<p>Fuel</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "key",
            "description": "<p>Key</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "note",
            "description": "<p>Note</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "invoice",
            "description": "<p>Invoice block has or has not</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "invoice_total_price",
            "description": "<p>Invoice Total Price</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "invoice_paid_price",
            "description": "<p>Invoice Paid Price</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "invoice_outstanding_price",
            "description": "<p>Invoice Outstanding Price</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "invoice_status",
            "description": "<p>Invoice Status</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "document",
            "description": "<p>Document block has or has not</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "type",
            "description": "<p>Document type Exp : (auction_picture, warehouse_picture,container_picture <br> car_fax_report , invoice, checklist_report , shipping_damage</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "file",
            "description": "<p>Document Exp : document[0][file],document[0][type]</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/store-auto"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auto/AutoController.php",
    "groupTitle": "Admin_Auto_Action"
  },
  {
    "type": "post",
    "url": "admin/store-note",
    "title": "Store note",
    "name": "Store_note",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "auto_id",
            "description": "<p>Auto id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "comment",
            "description": "<p>Comment</p>"
          }
        ]
      }
    },
    "version": "1.1.1",
    "group": "Admin_Auto_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/store-note"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auto/AutoNoteController.php",
    "groupTitle": "Admin_Auto_Action"
  },
  {
    "type": "post",
    "url": "admin/update-auto/{id}",
    "title": "Update Auto",
    "name": "Update_Auto",
    "version": "1.1.1",
    "group": "Admin_Auto_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "year",
            "description": "<p>Year</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "make_name",
            "description": "<p>Make name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "model_name",
            "description": "<p>Model name</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "client_id",
            "description": "<p>Client id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Status (new, not_approved, pending, delivered)</p>"
          },
          {
            "group": "Parameter",
            "type": "Boolean",
            "optional": false,
            "field": "offsite",
            "description": "<p>Offsite (1- true, 0 - false)</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "offsite_price",
            "description": "<p>Offsite Price</p>"
          },
          {
            "group": "Parameter",
            "type": "Date",
            "optional": false,
            "field": "purchased_date",
            "description": "<p>Purchased Date</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "ship",
            "description": "<p>Ship block has or has not</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "tracking_id",
            "description": "<p>Tracking id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "container_id",
            "description": "<p>Container id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "point_load_city",
            "description": "<p>Point load city</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "point_load_date",
            "description": "<p>Point load date</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "point_delivery_city",
            "description": "<p>Point delivery city</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "point_delivery_date",
            "description": "<p>Point delivery date</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "disassembly",
            "description": "<p>Disassembly Exp - 1 true, 0 - false</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "lot",
            "description": "<p>Lot block has or has not</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "lot_number",
            "description": "<p>Lot Number</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "doc_type",
            "description": "<p>Document type</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "odometer",
            "description": "<p>Odometer</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "highlight",
            "description": "<p>Highlight</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "pri_damage",
            "description": "<p>Primary damage</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "sec_damage",
            "description": "<p>Secondary damage</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "ret_value",
            "description": "<p>Retail value</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "vin_code",
            "description": "<p>Vin code</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "sale",
            "description": "<p>Sale block has or has not</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "location",
            "description": "<p>Location</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "grid_item",
            "description": "<p>Grid item</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "sale_name",
            "description": "<p>Saller name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "ret_date",
            "description": "<p>Secondary damage</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "feature",
            "description": "<p>Feature block has or has not</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "body_style",
            "description": "<p>Body style</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "color",
            "description": "<p>Color</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "eng_type",
            "description": "<p>Engine type</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "cylinder",
            "description": "<p>Cylinder</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "trans",
            "description": "<p>Transmission</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "drive",
            "description": "<p>Drive</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "fuel",
            "description": "<p>Fuel</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "key",
            "description": "<p>Key</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "note",
            "description": "<p>Note</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "invoice",
            "description": "<p>Invoice block has or has not</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "invoice_total_price",
            "description": "<p>Invoice Total Price</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "invoice_paid_price",
            "description": "<p>Invoice Paid Price</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "invoice_outstanding_price",
            "description": "<p>Invoice Outstanding Price</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "invoice_status",
            "description": "<p>Invoice Status</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/update-auto/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auto/AutoController.php",
    "groupTitle": "Admin_Auto_Action"
  },
  {
    "type": "get",
    "url": "admin/get-autos-dismanting",
    "title": "Show all autos dismanting",
    "name": "Show_all_autos_dismanting",
    "version": "1.1.1",
    "group": "Admin_Auto_Dismanting",
    "description": "<p>(countpage - for set Item PerPage, order_type - (asc, desc), order_by - column name for sort, port - for filter by port search - for search by (vin_code))</p>",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-autos-dismanting"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auto/AutoDismantingController.php",
    "groupTitle": "Admin_Auto_Dismanting"
  },
  {
    "type": "get",
    "url": "admin/get-auto-dismanting/{id}",
    "title": "Show  auto dismanting by Auto ID",
    "name": "Show_auto_dismanting_by_Auto_ID",
    "version": "1.1.1",
    "group": "Admin_Auto_Dismanting",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-auto-dismanting/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auto/AutoDismantingController.php",
    "groupTitle": "Admin_Auto_Dismanting"
  },
  {
    "type": "post",
    "url": "admin/update-auto-dismanting/{id}",
    "title": "Update auto dismanting by Auto ID",
    "name": "Update_auto_dismanting_by_Auto_ID",
    "version": "1.1.1",
    "group": "Admin_Auto_Dismanting",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "disassembly",
            "description": "<p>Disassembly Exp - 1 true, 0 - false</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/update-auto-dismanting/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auto/AutoDismantingController.php",
    "groupTitle": "Admin_Auto_Dismanting"
  },
  {
    "type": "get",
    "url": "admin/get-autos-shipping",
    "title": "Show all autos shipping",
    "name": "Show_all_autos_shipping",
    "version": "1.1.1",
    "group": "Admin_Auto_Shipping",
    "description": "<p>(countpage - for set Item PerPage, order_type - (asc, desc), order_by - column name for sort, port - for filter by port search - for search by (vin_code))</p>",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-autos-shipping"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auto/AutoShippingController.php",
    "groupTitle": "Admin_Auto_Shipping"
  },
  {
    "type": "get",
    "url": "admin/get-auto-shipping/{id}",
    "title": "Show  auto shipping by Auto ID",
    "name": "Show_auto_shipping_by_Auto_id",
    "version": "1.1.1",
    "group": "Admin_Auto_Shipping",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-auto-shipping/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auto/AutoShippingController.php",
    "groupTitle": "Admin_Auto_Shipping"
  },
  {
    "type": "post",
    "url": "admin/store-auto-shipping",
    "title": "Store Auto Shipping",
    "name": "Store_Auto_Shipping",
    "version": "1.1.1",
    "group": "Admin_Auto_Shipping",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "auto_id",
            "description": "<p>Auto ID example: [&quot;1&quot;, &quot;2&quot;, &quot;3&quot;]</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/store-auto-shipping"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auto/AutoShippingController.php",
    "groupTitle": "Admin_Auto_Shipping"
  },
  {
    "type": "post",
    "url": "admin/update-auto-shipping/{id}",
    "title": "Update Auto Shipping by Auto ID",
    "name": "Update_Auto_Shipping",
    "version": "1.1.1",
    "group": "Admin_Auto_Shipping",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "status",
            "description": "<p>Status (at_loading, on_the_way, at_unloading, finish)</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/update-auto-shipping/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Auto/AutoShippingController.php",
    "groupTitle": "Admin_Auto_Shipping"
  },
  {
    "type": "delete",
    "url": "admin/delete-client/{id}",
    "title": "Delete Client",
    "name": "Delete_Client",
    "version": "1.1.1",
    "group": "Admin_Client_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/delete-client/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Client/ClientController.php",
    "groupTitle": "Admin_Client_Action"
  },
  {
    "type": "post",
    "url": "admin/delete-client",
    "title": "Multiple Delete Client",
    "name": "Multiple_Delete_Client",
    "version": "1.1.1",
    "group": "Admin_Client_Action",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "client_id",
            "description": "<p>Array of Clients ID</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/delete-client"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Client/ClientController.php",
    "groupTitle": "Admin_Client_Action"
  },
  {
    "type": "get",
    "url": "admin/get-clients",
    "title": "Show All Clients",
    "name": "Show_All_Clients",
    "version": "1.1.1",
    "group": "Admin_Client_Action",
    "description": "<p>(countpage - for set Item PerPage, order_type - (asc, desc), order_by - column name for sort, search - for search by (name, email))</p>",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-clients"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Client/ClientController.php",
    "groupTitle": "Admin_Client_Action"
  },
  {
    "type": "get",
    "url": "admin/get-client/{id}",
    "title": "Show Client By Id",
    "name": "Show_Client_By_Id",
    "version": "1.1.1",
    "group": "Admin_Client_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-client/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Client/ClientController.php",
    "groupTitle": "Admin_Client_Action"
  },
  {
    "type": "post",
    "url": "admin/store-client",
    "title": "Store Client",
    "name": "Store_Client",
    "version": "1.1.1",
    "group": "Admin_Client_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "username",
            "description": "<p>Username</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>Phone exp - +3-8000-000-00-00</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Password</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "country",
            "description": "<p>Country</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "city",
            "description": "<p>City</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "zip",
            "description": "<p>Zip</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address",
            "description": "<p>Address</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "card_number",
            "description": "<p>Card number exp - 1234-1234-1234-1234</p>"
          },
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "image",
            "description": "<p>Client image</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/store-client"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Client/ClientController.php",
    "groupTitle": "Admin_Client_Action"
  },
  {
    "type": "post",
    "url": "admin/update-client/{id}",
    "title": "Update Client",
    "name": "Update_Client",
    "version": "1.1.1",
    "group": "Admin_Client_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "username",
            "description": "<p>Username</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>Phone exp - +3-8000-000-00-00</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Password</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "country",
            "description": "<p>Country</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "city",
            "description": "<p>City</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "zip",
            "description": "<p>Zip</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address",
            "description": "<p>Address</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "card_number",
            "description": "<p>Card number exp - 1234-1234-1234-1234</p>"
          },
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "image",
            "description": "<p>Client image</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/update-client/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Client/ClientController.php",
    "groupTitle": "Admin_Client_Action"
  },
  {
    "type": "get",
    "url": "admin/get-clients-by-filters",
    "title": "Show All Clients By Filters",
    "name": "Show_All_Clients_By_Filters",
    "version": "1.1.1",
    "group": "Admin_Client_Filter",
    "description": "<p>This is the Description. Allow get params for filters exp: id, name, email, phone, address, card_number</p>",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-clients-by-filters"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Client/ClientFilterController.php",
    "groupTitle": "Admin_Client_Filter"
  },
  {
    "type": "get",
    "url": "admin/download",
    "title": "Download document",
    "name": "Download_document",
    "version": "1.1.1",
    "group": "Admin_Download_document",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/download"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Document/DocumentController.php",
    "groupTitle": "Admin_Download_document"
  },
  {
    "type": "delete",
    "url": "admin/delete-group/{id}",
    "title": "Delete Group",
    "name": "Delete_Group",
    "version": "1.1.1",
    "group": "Admin_Groups_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/delete-group/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Group/GroupController.php",
    "groupTitle": "Admin_Groups_Action"
  },
  {
    "type": "get",
    "url": "admin/get-groups",
    "title": "Show All Groups",
    "name": "Show_All_Groups",
    "version": "1.1.1",
    "group": "Admin_Groups_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-groups"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Group/GroupController.php",
    "groupTitle": "Admin_Groups_Action"
  },
  {
    "type": "get",
    "url": "admin/get-group/{id}",
    "title": "Show Group By Id",
    "name": "Show_Group_By_Id",
    "version": "1.1.1",
    "group": "Admin_Groups_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-group/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Group/GroupController.php",
    "groupTitle": "Admin_Groups_Action"
  },
  {
    "type": "post",
    "url": "admin/store-group",
    "title": "Store Group",
    "name": "Store_Group",
    "version": "1.1.1",
    "group": "Admin_Groups_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "clients",
            "description": "<p>Clients ID Exm: 1,2,3,4,...</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/store-group"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Group/GroupController.php",
    "groupTitle": "Admin_Groups_Action"
  },
  {
    "type": "post",
    "url": "admin/update-group/{id}",
    "title": "Update Group",
    "name": "Update_Group",
    "version": "1.1.1",
    "group": "Admin_Groups_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "clients",
            "description": "<p>Clients ID Exm: 1,2,3,4,...</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/update-group/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Group/GroupController.php",
    "groupTitle": "Admin_Groups_Action"
  },
  {
    "type": "post",
    "url": "admin/delete-invoice-image/{id}",
    "title": "Delete document  invoice by id",
    "name": "Delete_document_invoice_by_id",
    "version": "1.1.1",
    "group": "Admin_Invoice_Action",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "ids",
            "description": "<p>Delete ids</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/delete-invoice-image/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Invoice/InvoiceController.php",
    "groupTitle": "Admin_Invoice_Action"
  },
  {
    "type": "delete",
    "url": "admin/delete-invoice/{id}",
    "title": "Delete  invoice by id",
    "name": "Delete_invoice_by_id",
    "version": "1.1.1",
    "group": "Admin_Invoice_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/delete-invoice/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Invoice/InvoiceController.php",
    "groupTitle": "Admin_Invoice_Action"
  },
  {
    "type": "post",
    "url": "admin/restore-invoice-document/{id}",
    "title": "Restore document  invoice by id",
    "name": "Restore_document_invoice_by_id",
    "version": "1.1.1",
    "group": "Admin_Invoice_Action",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "document",
            "description": "<p>Document</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/invoice-auto-document/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Invoice/InvoiceController.php",
    "groupTitle": "Admin_Invoice_Action"
  },
  {
    "type": "get",
    "url": "admin/get-invoices",
    "title": "Show All Invoices",
    "name": "Show_All_Invoices",
    "version": "1.1.1",
    "group": "Admin_Invoice_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-invoices"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Invoice/InvoiceController.php",
    "groupTitle": "Admin_Invoice_Action"
  },
  {
    "type": "get",
    "url": "admin/get-invoice/{id}",
    "title": "Show  Invoice by id",
    "name": "Show_Invoice_by_id",
    "version": "1.1.1",
    "group": "Admin_Invoice_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-invoice/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Invoice/InvoiceController.php",
    "groupTitle": "Admin_Invoice_Action"
  },
  {
    "type": "post",
    "url": "admin/store-invoice",
    "title": "Store invoice",
    "name": "Store_invoice",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name_car",
            "description": "<p>Name car</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "auto_id",
            "description": "<p>Auto id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Status</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "total_price",
            "description": "<p>Total price</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "paid_price",
            "description": "<p>Paid price</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "outstanding_price",
            "description": "<p>Outstanding price</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "total_shipping_price",
            "description": "<p>Total Shipping price</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "paid_shipping_price",
            "description": "<p>Paid Shipping price</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "outstanding_shipping_price",
            "description": "<p>Outstanding Shipping price</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "type",
            "description": "<p>Document type Exp : (auction_picture, warehouse_picture,container_picture <br> car_fax_report , invoice, checklist_report , shipping_damage</p>"
          },
          {
            "group": "Parameter",
            "type": "Array",
            "optional": false,
            "field": "file",
            "description": "<p>Document Exp : document[0][file],document[0][type]</p>"
          }
        ]
      }
    },
    "version": "1.1.1",
    "group": "Admin_Invoice_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/store-invoice"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Invoice/InvoiceController.php",
    "groupTitle": "Admin_Invoice_Action"
  },
  {
    "type": "post",
    "url": "admin/update-invoice/{id}",
    "title": "Update invoice",
    "name": "Update_invoice",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name_car",
            "description": "<p>Name car</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "auto_id",
            "description": "<p>Auto id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Status</p>"
          },
          {
            "group": "Parameter",
            "type": "Double",
            "optional": false,
            "field": "total_price",
            "description": "<p>Total price</p>"
          },
          {
            "group": "Parameter",
            "type": "Double",
            "optional": false,
            "field": "paid_price",
            "description": "<p>Paid price</p>"
          },
          {
            "group": "Parameter",
            "type": "Double",
            "optional": false,
            "field": "outstanding_price",
            "description": "<p>Outstanding price</p>"
          },
          {
            "group": "Parameter",
            "type": "Double",
            "optional": false,
            "field": "total_shipping_price",
            "description": "<p>Total Shipping price</p>"
          },
          {
            "group": "Parameter",
            "type": "Double",
            "optional": false,
            "field": "paid_shipping_price",
            "description": "<p>Paid Shipping price</p>"
          },
          {
            "group": "Parameter",
            "type": "Double",
            "optional": false,
            "field": "outstanding_shipping_price",
            "description": "<p>Outstanding Shipping price</p>"
          }
        ]
      }
    },
    "version": "1.1.1",
    "group": "Admin_Invoice_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/update-invoice/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Invoice/InvoiceController.php",
    "groupTitle": "Admin_Invoice_Action"
  },
  {
    "type": "delete",
    "url": "admin/delete-part/{id}",
    "title": "Delete Part",
    "name": "Delete_Part",
    "version": "1.1.1",
    "group": "Admin_Part_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/delete-part/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Part/PartController.php",
    "groupTitle": "Admin_Part_Action"
  },
  {
    "type": "get",
    "url": "admin/get-part/{id}",
    "title": "Get Part",
    "name": "Get_Part",
    "version": "1.1.1",
    "group": "Admin_Part_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-part/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Part/PartController.php",
    "groupTitle": "Admin_Part_Action"
  },
  {
    "type": "get",
    "url": "admin/get-parts",
    "title": "Get Parts",
    "name": "Get_Parts",
    "version": "1.1.1",
    "group": "Admin_Part_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-parts"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Part/PartController.php",
    "groupTitle": "Admin_Part_Action"
  },
  {
    "type": "post",
    "url": "admin/delete-part-images/{id}",
    "title": "Remove Part Images",
    "name": "Remove_Part_Images",
    "version": "1.1.1",
    "group": "Admin_Part_Action",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "ids",
            "description": "<p>IDs of images (1,2,3,...)</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/delete-part-images/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Part/PartController.php",
    "groupTitle": "Admin_Part_Action"
  },
  {
    "type": "post",
    "url": "admin/restore-part-images/{id}",
    "title": "Restore Part Images",
    "name": "Restore_Part_Images",
    "version": "1.1.1",
    "group": "Admin_Part_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "image",
            "description": "<p>Client images  exp  - image[0],image[1]</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/restore-part-images/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Part/PartController.php",
    "groupTitle": "Admin_Part_Action"
  },
  {
    "type": "post",
    "url": "admin/store-part",
    "title": "Store Part",
    "name": "Store_Part",
    "version": "1.1.1",
    "group": "Admin_Part_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "client_id",
            "description": "<p>Client Id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "catalog_number",
            "description": "<p>Catalog number</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "auto",
            "description": "<p>Auto</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "vin",
            "description": "<p>Vin</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "quality",
            "description": "<p>Quality</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "container",
            "description": "<p>Container</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Status</p>"
          },
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "image",
            "description": "<p>Client images  exp  - image[0],image[1]</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/store-part"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Part/PartController.php",
    "groupTitle": "Admin_Part_Action"
  },
  {
    "type": "post",
    "url": "admin/update-part/{id}",
    "title": "Update Part",
    "name": "Update_Part",
    "version": "1.1.1",
    "group": "Admin_Part_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "client_id",
            "description": "<p>Client Id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "catalog_number",
            "description": "<p>Catalog number</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "auto",
            "description": "<p>Auto</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "vin",
            "description": "<p>Vin</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "quality",
            "description": "<p>Quality</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "container",
            "description": "<p>Container</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "status",
            "description": "<p>Status</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/update-part/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Part/PartController.php",
    "groupTitle": "Admin_Part_Action"
  },
  {
    "type": "delete",
    "url": "admin/delete-payment/{id}",
    "title": "Delete Payment",
    "name": "Delete_Payment",
    "version": "1.1.1",
    "group": "Admin_Payments_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/delete-payment/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Payment/PaymentController.php",
    "groupTitle": "Admin_Payments_Action"
  },
  {
    "type": "get",
    "url": "admin/get-payments",
    "title": "Show All Payments",
    "name": "Show_All_Payments",
    "version": "1.1.1",
    "group": "Admin_Payments_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-payments"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Payment/PaymentController.php",
    "groupTitle": "Admin_Payments_Action"
  },
  {
    "type": "get",
    "url": "admin/get-payment/{id}",
    "title": "Show Payment By Id",
    "name": "Show_Payment_By_Id",
    "version": "1.1.1",
    "group": "Admin_Payments_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-payment/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Payment/PaymentController.php",
    "groupTitle": "Admin_Payments_Action"
  },
  {
    "type": "post",
    "url": "admin/store-payment",
    "title": "Store Payment",
    "name": "Store_Payment",
    "version": "1.1.1",
    "group": "Admin_Payments_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "applicable_type",
            "description": "<p>Attach Type (client, group)</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "applicable_id",
            "description": "<p>Client or Group ID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "due_day",
            "description": "<p>Days To Pay</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/store-payment"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Payment/PaymentController.php",
    "groupTitle": "Admin_Payments_Action"
  },
  {
    "type": "post",
    "url": "admin/update-payment/{id}",
    "title": "Update Payment",
    "name": "Update_Payment",
    "version": "1.1.1",
    "group": "Admin_Payments_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "applicable_type",
            "description": "<p>Attach Type (client, group)</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "applicable_id",
            "description": "<p>Client or Group ID</p>"
          },
          {
            "group": "Parameter",
            "type": "Integer",
            "optional": false,
            "field": "due_day",
            "description": "<p>Days To Pay</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/update-payment/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Payment/PaymentController.php",
    "groupTitle": "Admin_Payments_Action"
  },
  {
    "type": "delete",
    "url": "admin/delete-price/{id}",
    "title": "Delete Price",
    "name": "Delete_Price",
    "version": "1.1.1",
    "group": "Admin_Prices_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/delete-price/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Price/PriceController.php",
    "groupTitle": "Admin_Prices_Action"
  },
  {
    "type": "get",
    "url": "admin/get-prices",
    "title": "Show All Prices",
    "name": "Show_All_Prices",
    "version": "1.1.1",
    "group": "Admin_Prices_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-prices"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Price/PriceController.php",
    "groupTitle": "Admin_Prices_Action"
  },
  {
    "type": "get",
    "url": "admin/get-price/{id}",
    "title": "Show Price By Id",
    "name": "Show_Price_By_Id",
    "version": "1.1.1",
    "group": "Admin_Prices_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/get-price/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Price/PriceController.php",
    "groupTitle": "Admin_Prices_Action"
  },
  {
    "type": "post",
    "url": "admin/store-price",
    "title": "Store Price",
    "name": "Store_Price",
    "version": "1.1.1",
    "group": "Admin_Prices_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "priceable_type",
            "description": "<p>Attach Type (client, group)</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "priceable_id",
            "description": "<p>Client or Group ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "dependency",
            "description": "<p>Example: c=1,p=100;c=2,p=200 Where c - City ID, p - Price, delimiter by ;</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/store-price"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Price/PriceController.php",
    "groupTitle": "Admin_Prices_Action"
  },
  {
    "type": "post",
    "url": "admin/update-price/{id}",
    "title": "Update Price",
    "name": "Update_Price",
    "version": "1.1.1",
    "group": "Admin_Prices_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "priceable_type",
            "description": "<p>Attach Type (client, group)</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "priceable_id",
            "description": "<p>Client or Group ID</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "dependency",
            "description": "<p>Example: c=1,p=100;c=2,p=200 Where c - City ID, p - Price, delimiter by ;</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/update-price/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Price/PriceController.php",
    "groupTitle": "Admin_Prices_Action"
  },
  {
    "type": "post",
    "url": "client/notifications/create",
    "title": "Create notification",
    "name": "Create_notification",
    "version": "1.1.1",
    "group": "Client_Action",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "type",
            "description": "<p>Type (auto, auto_for_dismanting, parts, shipping, invoices)</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "body",
            "description": "<p>Notification body</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/notifications/create"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Notification/NotificationController.php",
    "groupTitle": "Client_Action"
  },
  {
    "type": "get",
    "url": "client/get-profile",
    "title": "Show Profile",
    "name": "Show_Profile",
    "version": "1.1.1",
    "group": "Client_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/get-profile"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Profile/ProfileController.php",
    "groupTitle": "Client_Action"
  },
  {
    "type": "get",
    "url": "client/notifications",
    "title": "Show all notifications",
    "name": "Show_all_notifications",
    "version": "1.1.1",
    "group": "Client_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/notifications"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Notification/NotificationController.php",
    "groupTitle": "Client_Action"
  },
  {
    "type": "post",
    "url": "client/update-profile",
    "title": "Update Profile",
    "name": "Update_Profile",
    "version": "1.1.1",
    "group": "Client_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "username",
            "description": "<p>Username</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "phone",
            "description": "<p>Phone exp - +3-8000-000-00-00</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "country",
            "description": "<p>Country</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "city",
            "description": "<p>City</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "zip",
            "description": "<p>Zip</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "address",
            "description": "<p>Address</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "card_number",
            "description": "<p>Card number exp - 1234-1234-1234-1234</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "old_password",
            "description": "<p>Current Password</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>New Password</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password_confirmation",
            "description": "<p>Password confirmation</p>"
          },
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "image",
            "description": "<p>Client image</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/update-profile"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Profile/ProfileController.php",
    "groupTitle": "Client_Action"
  },
  {
    "type": "post",
    "url": "client/notifications",
    "title": "Update notifications status",
    "name": "Update_notifications_status",
    "version": "1.1.1",
    "group": "Client_Action",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "type",
            "description": "<p>Notifications Type (auto, auto_for_dismanting, parts, shipping, invoices)</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/notifications"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Notification/NotificationController.php",
    "groupTitle": "Client_Action"
  },
  {
    "type": "post",
    "url": "client/login",
    "title": "Login Client",
    "name": "Login_Client",
    "version": "1.1.1",
    "group": "Client_Auth",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Password</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/login"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Auth/AuthController.php",
    "groupTitle": "Client_Auth"
  },
  {
    "type": "post",
    "url": "client/logout",
    "title": "Logout Client",
    "name": "Logout_Client",
    "version": "1.1.1",
    "group": "Client_Auth",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/logout"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Auth/AuthController.php",
    "groupTitle": "Client_Auth"
  },
  {
    "type": "post",
    "url": "client/register",
    "title": "Register Client",
    "name": "Register_Client",
    "version": "1.1.1",
    "group": "Client_Auth",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "email",
            "description": "<p>Email</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password",
            "description": "<p>Password</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "password_confirmation",
            "description": "<p>Password Confirmation</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/register"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Auth/AuthController.php",
    "groupTitle": "Client_Auth"
  },
  {
    "type": "get",
    "url": "client/get-invoices",
    "title": "Show All Invoices",
    "name": "Show_All_Invoices",
    "version": "1.1.1",
    "group": "Client_Auto",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/get-invoices"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Invoice/InvoiceController.php",
    "groupTitle": "Client_Auto"
  },
  {
    "type": "get",
    "url": "client/get-autos",
    "title": "Show all autos",
    "name": "Show_all_autos",
    "version": "1.1.1",
    "group": "Client_Auto",
    "description": "<p>This is the Description. Allow get params for filters exp: container, lot_number, model_name, vin, point_load_city, status</p>",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/get-autos"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Auto/AutoController.php",
    "groupTitle": "Client_Auto"
  },
  {
    "type": "get",
    "url": "client/get-autos-dismanting",
    "title": "Show all autos dismanting",
    "name": "Show_all_autos_dismanting",
    "version": "1.1.1",
    "group": "Client_Auto",
    "description": "<p>(countpage - for set Item PerPage, order_type - (asc, desc), order_by - column name for sort, port - for filter by port search - for search by (vin_code))</p>",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/get-autos-dismanting"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Auto/AutoDismantingController.php",
    "groupTitle": "Client_Auto"
  },
  {
    "type": "get",
    "url": "client/get-autos-shipping",
    "title": "Show all autos shipping",
    "name": "Show_all_autos_shipping",
    "version": "1.1.1",
    "group": "Client_Auto",
    "description": "<p>(countpage - for set Item PerPage, order_type - (asc, desc), order_by - column name for sort, port - for filter by port search - for search by (vin_code))</p>",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/get-autos-shipping"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Auto/AutoShippingController.php",
    "groupTitle": "Client_Auto"
  },
  {
    "type": "get",
    "url": "client/get-auto/{id}",
    "title": "Show  auto by id",
    "name": "Show_auto_by_id",
    "version": "1.1.1",
    "group": "Client_Auto",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/get-auto/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Auto/AutoController.php",
    "groupTitle": "Client_Auto"
  },
  {
    "type": "post",
    "url": "client/store-note",
    "title": "Store note",
    "name": "Store_note",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "auto_id",
            "description": "<p>Auto id</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "comment",
            "description": "<p>Comment</p>"
          }
        ]
      }
    },
    "version": "1.1.1",
    "group": "Client_Auto",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/store-note"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Auto/AutoNoteController.php",
    "groupTitle": "Client_Auto"
  },
  {
    "type": "get",
    "url": "client/overview",
    "title": "Client Overview Page",
    "name": "Client_Overview_Page",
    "version": "1.1.1",
    "group": "Client_Overview",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/overview"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Overview/OverviewController.php",
    "groupTitle": "Client_Overview"
  },
  {
    "type": "delete",
    "url": "client/delete-part/{id}",
    "title": "Delete Part",
    "name": "Delete_Part",
    "version": "1.1.1",
    "group": "Client_Part_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/delete-part/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Part/PartController.php",
    "groupTitle": "Client_Part_Action"
  },
  {
    "type": "get",
    "url": "client/get-part/{id}",
    "title": "Get Part",
    "name": "Get_Part",
    "version": "1.1.1",
    "group": "Client_Part_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/get-part/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Part/PartController.php",
    "groupTitle": "Client_Part_Action"
  },
  {
    "type": "get",
    "url": "client/get-parts",
    "title": "Get Parts",
    "name": "Get_Parts",
    "version": "1.1.1",
    "group": "Client_Part_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/get-parts"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Part/PartController.php",
    "groupTitle": "Client_Part_Action"
  },
  {
    "type": "delete",
    "url": "client/delete-part-images/{id}",
    "title": "Remove Part Images",
    "name": "Remove_Part_Images",
    "version": "1.1.1",
    "group": "Client_Part_Action",
    "description": "<p>Example:  Allow get params for delete images exp: ids=1,2,3,4...</p>",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/delete-part-images/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Part/PartController.php",
    "groupTitle": "Client_Part_Action"
  },
  {
    "type": "post",
    "url": "client/restore-part-images/{id}",
    "title": "Restore Part Images",
    "name": "Restore_Part_Images",
    "version": "1.1.1",
    "group": "Client_Part_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "image",
            "description": "<p>Client images  exp  - image[0],image[1]</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/restore-part-images/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Part/PartController.php",
    "groupTitle": "Client_Part_Action"
  },
  {
    "type": "post",
    "url": "client/store-part",
    "title": "Store Part",
    "name": "Store_Part",
    "version": "1.1.1",
    "group": "Client_Part_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "catalog_number",
            "description": "<p>Catalog number</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "auto",
            "description": "<p>Auto</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "vin",
            "description": "<p>Vin</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "quality",
            "description": "<p>Quality</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "container",
            "description": "<p>Container</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "comment",
            "description": "<p>Comment</p>"
          },
          {
            "group": "Parameter",
            "type": "File",
            "optional": false,
            "field": "image",
            "description": "<p>Client images  exp  - image[0],image[1]</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/store-part"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Part/PartController.php",
    "groupTitle": "Client_Part_Action"
  },
  {
    "type": "post",
    "url": "client/update-part/{id}",
    "title": "Update Part",
    "name": "Update_Part",
    "version": "1.1.1",
    "group": "Client_Part_Action",
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "catalog_number",
            "description": "<p>Catalog number</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "name",
            "description": "<p>Name</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "auto",
            "description": "<p>Auto</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "vin",
            "description": "<p>Vin</p>"
          },
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "quality",
            "description": "<p>Quality</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "container",
            "description": "<p>Container</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "comment",
            "description": "<p>Comment</p>"
          }
        ]
      }
    },
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-client/update-part/{id}"
      }
    ],
    "filename": "app/Http/Controllers/ApiClient/Part/PartController.php",
    "groupTitle": "Client_Part_Action"
  },
  {
    "type": "post",
    "url": "admin/parser/{table}",
    "title": "Get Excel document",
    "name": "Get_Excel_document",
    "version": "1.1.1",
    "group": "Excel",
    "description": "<p>Allowed Tables (client, base_clients, groups, parts, autos, invoices, shippings, dismantings)</p>",
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "type": "Number",
            "optional": false,
            "field": "client_id",
            "description": "<p>Client ID for Client</p>"
          },
          {
            "group": "Parameter",
            "type": "String",
            "optional": false,
            "field": "fields",
            "description": "<p>Fields for pars Exm: id,status,name,..., auto.id,auto.status,lot_infos.vin_code,ship_infos.point_load_city</p>"
          }
        ]
      }
    },
    "permission": [
      {
        "name": "Authorization"
      }
    ],
    "header": {
      "fields": {
        "Header": [
          {
            "group": "Header",
            "optional": false,
            "field": "Authorization",
            "description": "<p>token</p>"
          }
        ]
      }
    },
    "sampleRequest": [
      {
        "url": "/api-admin/parser/{table}"
      }
    ],
    "filename": "app/Http/Controllers/ApiAdmin/Parser/ParserController.php",
    "groupTitle": "Excel"
  }
] });
