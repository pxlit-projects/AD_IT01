using FirstFloor.ModernUI.Presentation;
using FirstFloor.ModernUI.Windows.Controls;
using ModernUINavigationApp1.Pages;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using System.Windows;
using System.Windows.Controls;
using System.Windows.Data;
using System.Windows.Documents;
using System.Windows.Input;
using System.Windows.Media;
using System.Windows.Media.Imaging;
using System.Windows.Navigation;
using System.Windows.Shapes;

namespace ModernUINavigationApp1
{
    /// <summary>
    /// Interaction logic for MainWindow.xaml
    /// </summary>
    public partial class MainWindow : ModernWindow
    {
        public static bool login = false;
        public static ModernWindow LoginW;
        public MainWindow()
        {
            InitializeComponent();
            
          
            /*
                this.MenuLinkGroups = new LinkGroupCollection();
                var linkTestGroup1 = new LinkGroup { DisplayName = "TestGroup1" };
                var link1 = new Link { DisplayName = "Link 1", Source = new Uri("/Pages/Link1.xaml", UriKind.Relative) };
                linkTestGroup1.Links.Add(link1);
                this.MenuLinkGroups.Add(linkTestGroup1);
             
            var LoginCommand = new RelayCommand(o => LoginWindow(o));
            LinkNavigator.Commands.Add(new Uri("cmd://sayHello", UriKind.Absolute), LoginCommand);
             */
            if (login == false)
            {
                
            }

            
        }
        public RelayCommand LoginCommand { get; private set; }

        public static void LoginWindow()
        {
                       
             LoginW = new ModernWindow
            {
                Style = (Style)App.Current.Resources["EmptyWindow"],
                Content = new Login(),
                SizeToContent = SizeToContent.WidthAndHeight
            };

                LoginW.Show(); 
        }

        public static void LoginClose()
        {
            LoginW.Close();
        }

        public static void enableLogin()
        {
            login = true;
        }

        public static void setMenuLinks() 
        {

        }
    }
}
