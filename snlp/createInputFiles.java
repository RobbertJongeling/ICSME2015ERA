import com.opencsv.CSVReader; // http://opencsv.sourceforge.net/
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.FileReader;
import java.io.Writer;
import java.io.IOException;
import java.io.OutputStreamWriter;

/**
 *
 * @author Robbert
 */
 //converts a list of n lines in the format: id, text 
 //into n files of name id.txt and content text
public class createInputFiles {

	String inputFile = "<<YOUR INPUT FILE HERE>>";
	String[] nextline;
	String path = "<<YOUR OUTPUT FILE HERE>>";
	
	public void create() throws FileNotFoundException, IOException {
		CSVReader reader = new CSVReader(new FileReader(inputFile));
		
		while ((nextline = reader.readNext()) != null) {
			Writer writer = new OutputStreamWriter(new FileOutputStream(path + nextline[0] + ".txt"));
			writer.write(nextline[1]);
			writer.close();
		}
		
		reader.close();
	}
	
	/**
	 * @param args the command line arguments
	 */
	public static void main(String[] args) throws FileNotFoundException, IOException {
		new createInputFiles().create();		
	}
}
