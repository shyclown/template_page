var Article_Editor = function()
{
  this.settings = {
    content_id: 'article-content',
  }
  this.oDoc;
  this.sDefTxt;

  this.initDoc = function(){
      this.oDoc = _id(this.settings.content_id);
      this.DefTxt = this.oDoc.innerHTML;
      if(document.compForm.switchMode.checked){ setDocMode(true); }
  }

  this.formatDoc = function(sCmd, sValue){
    if (this.validateMode())
    {
      if(sValue=="CODE")
      {
        var range = document.getSelection();
        selectedElement = document.getSelection().anchorNode.parentElement;
        var selection =  selectedElement.innerHTML;
        var code = document.createElement("CODE");
        code.innerHTML = selection;
        tag = selectedElement.tagName;
        getTag = sValue.toUpperCase();

        if(tag == 'CODE' || tag =='LI' || tag == 'H3' || tag == 'H2'){} //do nothing
        else if(tag == 'P'){
          selectedElement.innerHTML = '';
          selectedElement.appendChild(code);
        }
        else{
          selectedElement.parentElement.insertBefore(code, selectedElement);
          selectedElement.parentElement.removeChild(selectedElement);
        }
      }
      else if(sValue=="p"||sValue=="h2"||sValue=="h3")
      {
        var range = document.getSelection();
        selectedElement = document.getSelection().anchorNode.parentElement;
        tag = selectedElement.tagName;
        getTag = sValue.toUpperCase();
        id = selectedElement.parentNode.id;
        if(tag == getTag || tag =='LI'){} //do nothingid!='article-content'
        else
        {
          document.execCommand(sCmd, false, sValue); this.oDoc.focus();
        }
      }
      else
      {
        document.execCommand(sCmd, false, sValue); this.oDoc.focus();
      }
    }
  }

  this.removeFormat = function() {
    this.formatDoc('removeFormat');
    this.formatDoc('formatblock','p');
  }
  this.validateMode = function() {
    if (!document.compForm.switchMode.checked) { return true ; }
    alert("Uncheck \"Show HTML\".");
    this.oDoc.focus();
    return false;
  }

  this.setDocMode = function(bToSource) {
    var oContent;
    var self = this;
    if (bToSource) {
      oContent = document.createTextNode(self.oDoc.innerHTML);
      self.oDoc.innerHTML = "";
      var oPre = document.createElement("pre");
      self.oDoc.contentEditable = false;
      oPre.id = "sourceText";
      oPre.contentEditable = true;
      oPre.appendChild(oContent);
      self.oDoc.appendChild(oPre);
    } else {
      if (document.all) {
        self.oDoc.innerHTML = self.oDoc.innerText;
      } else {
        oContent = document.createRange();
        oContent.selectNodeContents(self.oDoc.firstChild);
        self.oDoc.innerHTML = oContent.toString();
      }
      self.oDoc.contentEditable = true;
    }
    //oDoc.focus();
  }

  this.printDoc = function() {
    if (!validateMode()) { return; }
    var oPrntWin = window.open("","_blank","width=450,height=470,left=400,top=100,menubar=yes,toolbar=no,location=no,scrollbars=yes");
    oPrntWin.document.open();
    oPrntWin.document.write("<!doctype html><html><head><title>Print<\/title><\/head><body onload=\"print();\">" + this.oDoc.innerHTML + "<\/body><\/html>");
    oPrntWin.document.close();
  }
  // Generate buttons fn
  this.generateButtons = function(){

    var self = this;

    var resource_folder = '/elephant/resources/icons-editor/';
    var images_class = 'intLink';

    var btns = {
      Undo: {
        nicename:'Undo',
        fname:'undo.png',
        btn_event: function(){self.formatDoc('undo')}
      },
      Redo: {
        nicename:'Redo',
        fname:'redo.png',
        btn_event: function(){self.formatDoc('redo')}
      },
      Remove_formating: {
        nicename:'Remove_formating',
        fname:'formatx.png',
        btn_event: function(){self.removeFormat()}
      },
      Header_H2: {
        nicename:'Header_H2',
        fname:'h2.png',
        btn_event: function(){self.formatDoc('formatblock','h2')}
      },
      Header_H3: {
        nicename:'Header_H3',
        fname:'h3.png',
        btn_event: function(){self.formatDoc('formatblock','h3')}
      },
      Bold: {
        nicename:'Bold',
        fname:'bold_2.png',
        btn_event: function(){self.formatDoc('bold')}
      },
      Italic: {
        nicename:'Italic',
        fname:'italic.png',
        btn_event: function(){self.formatDoc('italic')}
      },
      Underline: {
        nicename:'Underline',
        fname:'underline.png',
        btn_event: function(){self.formatDoc('underline')}
      },
      Align_left: {
        nicename:'Align left',
        fname:'align_left.png',
        btn_event: function(){self.formatDoc('justifyleft');}
      },
      Align_center: {
        nicename:'Align center',
        fname:'align_center.png',
        btn_event: function(){self.formatDoc('justifycenter');}
      },
      Align_right: {
        nicename:'Align right',
        fname:'align_right.png',
        btn_event:function(){self.formatDoc('justifyright');}
      },
      Align_full: {
        nicename:'Align full',
        fname:'align_full.png',
        btn_event: function(){self.formatDoc('justifyFull');}
      },
      Numbered_list: {
        nicename:'Numbered list',
        fname:'nr_list.png',
        btn_event: function(){self.formatDoc('insertorderedlist');}
      },
      Dotted_list: {
        nicename:'Dotted list',
        fname:'ul_list.png',
        btn_event: function(){self.formatDoc('insertunorderedlist');}
      },
      Add_identation: {
        nicename:'Add identation',
        fname:'tab_right.png',
        btn_event: function(){self.formatDoc('indent');}
      },
      Delete_identation: {
        nicename:'Delete identation',
        fname:'tab_left.png',
        btn_event: function(){self.formatDoc('outdent');}
      },
      Quote:{
        nicename:'Quote',
        fname:'quote.png',
        btn_event: function(){self.formatDoc('formatblock','BLOCKQUOTE')}
      },
      Hyperlink:{
        nicename:'Hyperlink',
        fname:'link_article.png',
        btn_event:function(){var sLnk=prompt('Write the URL here','http:\/\/');if(sLnk&&sLnk!=''&&sLnk!='http://'){self.formatDoc('createlink',sLnk)}}
      },
      Code: {
        nicename:'Code',
        fname:'code_icon.png',
        btn_event: function(){self.formatDoc('formatblock','code')}
      },
      Print: {
        nicename:'Print',
        fname:'print.png',
        btn_event: function(){self.printDoc()}
      },
    }

    var populate = function()
    {
      var oPlacement = _cl("controlButtons")[0];
      for(var item in btns){
        var el = document.createElement('img');
        oPlacement.appendChild(el);
        el.src = resource_folder+btns[item].fname;
        el.className = images_class;
        el.title = btns[item].nicename;
        el.addEventListener('click',btns[item].btn_event,false);
      }
      document.compForm.switchMode.addEventListener('change',function(){
        self.setDocMode(this.checked);
      },false);

      document.compForm.addEventListener('submit',function(){
        //event.preventDefault();
        if(self.validateMode())
        {
          this.content.value=self.oDoc.innerHTML;
          return true;
        }
        return false;
      },false);
    }
    populate();
  }
  this.generateButtons();
  this.initDoc();
}
