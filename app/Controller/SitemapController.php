 <?php 
class SitemapController extends AppController{ 
	function sitemap()
	{
		Configure::write('debug', 0);

		$articles = $this->Article->getSitemapInformation();

		$this->set(compact('articles'));
		$this->RequestHandler->respondAs('xml');
	}
}