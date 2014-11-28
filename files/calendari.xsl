<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">
  <html>
  <head>
  <script>
  var cl="";  
</script>

<style>
table {
   width: 500px;
   border: 2px solid #00f;
   align: right;
   left-margin: 10px; 
}
td.petit, th.petit 
{
width: 40px; 
}
td.normal {
width : 125px; 
}


caption {
   padding: 0.3em;
   color: #fff;
    background: #f00;
    font-size : 18px; 
}
th {
   background: #cccccc;
}

</style>
  </head>
  <body>
    
<table border="1" width="400">
<caption> Calendari jornada 1</caption>

 <xsl:for-each select='taller_xml/calendari_acb[jornada="1"]' > 
 
                       

<tr onmouseover="cl=this.style.background;  this.style.background='pink';" onmouseout="this.style.background=cl;" >    <!-- Efecte resaltador al pasar ratoli -->

<td> <xsl:value-of select="equip_local" /></td>
<td><xsl:value-of select="punts_local" /></td>
<td> <xsl:value-of select="equip_visitant" /></td>
<td><xsl:value-of select="punts_visitant" /></td>
</tr>

  </xsl:for-each>

</table>  
  </body>
  </html>
</xsl:template>
</xsl:stylesheet>     
