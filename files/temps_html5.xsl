<?xml version="1.0" encoding="utf-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:template match="/">

    
<table border="0" width="400">


<tr><td><xsl:value-of select="current/city/@name"/></td></tr>  
            
<tr><td><xsl:value-of select="current/temperature/@value"/></td></tr>
<tr><td>
<xsl:choose>
      <xsl:when test="current/weather/@icon = '01d'">        
	 <img src="../images/tiempo/01d.jpg" ></img> 	
      </xsl:when>
      <xsl:when test="current/weather/@icon = '02d'">        
	 <img src="../images/tiempo/02d.jpg" ></img> 	
      </xsl:when>
      <xsl:when test="current/weather/@icon = '03d'">        
	 <img src="../images/tiempo/03d.jpg" ></img> 	
      </xsl:when>
      <xsl:when test="current/weather/@icon = '04d'">        
	 <img src="../images/tiempo/04d.jpg" ></img> 	
      </xsl:when>
      <xsl:when test="current/weather/@icon = '09d'">        
	 <img src="../images/tiempo/09d.jpg" ></img> 	
      </xsl:when>
      <xsl:when test="current/weather/@icon = '10d'">        
	 <img src="../images/tiempo/10d.jpg" ></img> 	
      </xsl:when>
      <xsl:when test="current/weather/@icon = '11d'">        
	 <img src="../images/tiempo/11d.jpg" ></img> 	
      </xsl:when>
      <xsl:when test="current/weather/@icon = '13d'">        
	 <img src="../images/tiempo/13d.jpg" ></img> 	
      </xsl:when>
      <xsl:when test="current/weather/@icon = '01n'">        
	 <img src="../images/tiempo/01n.jpg" ></img> 	
      </xsl:when>
      <xsl:when test="current/weather/@icon = '02n'">        
	 <img src="../images/tiempo/02n.jpg" ></img> 	
      </xsl:when>
      <xsl:when test="current/weather/@icon = '03n'">        
	 <img src="../images/tiempo/03n.jpg" ></img> 	
      </xsl:when>
      <xsl:when test="current/weather/@icon = '04n'">        
	 <img src="../images/tiempo/04n.jpg" ></img> 	
      </xsl:when>
      <xsl:when test="current/weather/@icon = '09n'">        
	 <img src="../images/tiempo/09n.jpg" ></img> 	
      </xsl:when>
      <xsl:when test="current/weather/@icon = '10n'">        
	 <img src="../images/tiempo/10n.jpg" ></img> 	
      </xsl:when>
      <xsl:when test="current/weather/@icon = '11n'">        
	 <img src="../images/tiempo/11n.jpg" ></img> 	
      </xsl:when>
      <xsl:when test="current/weather/@icon = '13n'">        
	 <img src="../images/tiempo/13n.jpg" ></img> 	
      </xsl:when>
     
      <xsl:otherwise>
         
      </xsl:otherwise>
</xsl:choose>

</td></tr>
</table> 

</xsl:template>
</xsl:stylesheet>     
