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
    "type": "get",
    "url": "admin/get-clients",
    "title": "Show All Clients",
    "name": "Show_All_Clients",
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
            "description": "<p>Phone exp - 380000000000</p>"
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
            "description": "<p>Phone exp - +380-00-00-00-000</p>"
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
    "type": "delete",
    "url": "admin/delete-part-images/{id}",
    "title": "Remove Part Images",
    "name": "Remove_Part_Images",
    "version": "1.1.1",
    "group": "Admin_Part_Action",
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
            "field": "make",
            "description": "<p>Make</p>"
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
            "field": "make",
            "description": "<p>Make</p>"
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
  }
] });
