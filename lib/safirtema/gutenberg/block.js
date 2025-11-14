const { registerBlockType } = wp.blocks;
const { RichText, InspectorControls } = wp.blockEditor;
const { TextControl, TextareaControl, ToggleControl, PanelBody, PanelRow, SelectControl} = wp.components;

registerBlockType('safirtema/safirbutton', {
	title: 'Safir Button',
	category: 'common',
	icon: 'admin-links',
	description: 'Link verebileceğiniz ikonlu Safir Button',
	attributes: {
		icon: {
			type: 'string',
			default: 'mouse'
		},
		text: {
			type: 'string',
			default: 'Buton Metni'
		},
		link: {
			type: 'string',
			default: '#'
		},
		newtab: {
			type: 'boolean',
			default: false
		},
		alt: {
			type: 'boolean',
			default: false
		},
	},
	edit: (props) => {
		const { attributes, setAttributes } = props;
		return (
			<div className="safirGutenbergBlockContainer overflow">
				<InspectorControls>
					<PanelBody>
						<PanelRow>
							<TextControl
								label="Buton metni"
								value={attributes.text}
								onChange={(newval) => setAttributes({ text: newval })}
							/>
						</PanelRow>
					</PanelBody>
					<PanelBody>
						<PanelRow>
							<TextControl
								label="Bağlantı adresi"
								value={attributes.link}
								onChange={(newval) => setAttributes({ link: newval })}
							/>
						</PanelRow>
						<PanelRow>
							<ToggleControl
								label="Linki yeni sekmede aç"
								checked={attributes.newtab}
								onChange={(newval) => setAttributes({ newtab: newval })}
							/>
						</PanelRow>
						<PanelRow>
							<ToggleControl
								label="Alternatif stili kullan"
								checked={attributes.alt}
								onChange={(newval) => setAttributes({ alt: newval })}
							/>
						</PanelRow>
					</PanelBody>
					<PanelBody>
						<div>
							<p>İkon seçimi</p>
							<div className="safirGutenbergIcons">
								{
									safirIcons.map((icon, i) =>
										<div onClick={ function() { setAttributes({ icon: icon })}} className="icon safiricon">
											<div className="inner">
											<svg className={"safiricon-" + icon}>
												<use href={"#safiricon-" + icon}></use>
											</svg>
											</div>
										</div>
									)
								}
							</div>
						</div>
					</PanelBody>
				</InspectorControls>
				<div className={attributes.alt ? 'safirButton alt' : 'safirButton'}>
					<div className={"icon safiricon"}>
						<svg className={"safiricon-" + attributes.icon}>
							<use href={"#safiricon-" + attributes.icon}></use>
						</svg>
					</div>
					{attributes.text}
				</div>
			</div>
		);
	},
	save: (props) => {
		const { attributes } = props;
		return (
			<a className={attributes.alt ? 'safirButton alt' : 'safirButton'} href={attributes.link} rel={attributes.newtab ? 'external' : ''}>
				<div className={"icon safiricon"}>
					<svg className={"safiricon-" + attributes.icon}>
						<use href={"#safiricon-" + attributes.icon}></use>
					</svg>
				</div>
				{attributes.text}
			</a>
		);
	}
});

registerBlockType('safirtema/mainheading', {
	title: 'Safir İkonlu Başlık',
	category: 'common',
	icon: 'edit',
	description: 'İkonlu bir başlık eklemek için kullanılabilecek başlık bloğu',
	attributes: {
		icon: {
			type: 'string',
			default: 'mouse'
		},
		text: {
			type: 'string',
			default: 'Buton Metni'
		},
	},
	edit: (props) => {
		const { attributes, setAttributes } = props;
		function updateIcon(target) {
			setAttributes( { icon: event.target.dataset.icon } );
		}
		return (
			<div className="safirGutenbergBlockContainer">
				<InspectorControls>
					<PanelBody>
						<PanelRow>
							<TextControl
								label="Başlık metni"
								value={attributes.text}
								onChange={(newval) => setAttributes({ text: newval })}
							/>
						</PanelRow>
					</PanelBody>
					<PanelBody>
						<div>
							<p>İkon seçimi</p>
							<div className="safirGutenbergIcons">
								{
									safirIcons.map((icon, i) =>
										<div onClick={ function() { setAttributes({ icon: icon })}} className="icon safiricon">
											<div className="inner">
											<svg className={"safiricon-" + icon}>
												<use href={"#safiricon-" + icon}></use>
											</svg>
											</div>
										</div>
									)
								}
							</div>
						</div>
					</PanelBody>
				</InspectorControls>
				<div className="mainHeading">
					<div className={"icon safiricon"}>
						<svg className={"safiricon-" + attributes.icon}>
							<use href={"#safiricon-" + attributes.icon}></use>
						</svg>
					</div>
					<div className="text">{attributes.text}</div>
				</div>
			</div>
		);
	},
	save: (props) => {
		const { attributes } = props;
		return (
			<div className="mainHeading">
				<div className={"icon safiricon"}>
					<svg className={"safiricon-" + attributes.icon}>
						<use href={"#safiricon-" + attributes.icon}></use>
					</svg>
				</div>
				<div className="text">{attributes.text}</div>
			</div>
		);
	}
});

registerBlockType('safirtema/sorucevap', {
	title: 'Safir Soru Cevap',
	category: 'common',
	icon: 'editor-help',
	description: 'Tıklanınca açılan soru ve cevap kombinasyonu',
	attributes: {
		title: {
			type: 'string',
			default: 'Sağdaki blok ayarlarından soru metnini giriniz.'
		},
		content: {
			type: 'string',
			source: 'html',
			selector: 'p',
			default: 'Cevap buraya gelecek.'
		},
	},
	edit: (props) => {
		const { attributes, setAttributes } = props;
		return (
			<div className="safirGutenbergBlockContainer">
				<InspectorControls>
					<PanelBody>
						<PanelRow>
							<TextControl
								label="Sorunuz"
								value={attributes.title}
								onChange={(newval) => setAttributes({ title: newval })}
							/>
						</PanelRow>
					</PanelBody>
				</InspectorControls>
				<div className="safir-faq">
					<div className="question">
						<div className="safiricon icon">
							<svg className="safiricon-soru">
								<use href="#safiricon-soru"></use>
							</svg>
						</div>
						<span className="text">{attributes.title}</span>
					</div>
					<RichText
						tagName="p"
						placeholder="Buraya cevabınızı yazınız."
						value={attributes.content}
						onChange={(newval) => setAttributes({ content: newval })}
					/>
				</div>
			</div>
		);
	},
	save: (props) => {
		const { attributes } = props;
		return (
			<div className="safir-faq">
				<div className="question">
					<div className="safiricon icon">
						<svg className="safiricon-soru">
							<use href="#safiricon-soru"></use>
						</svg>
					</div>
					<span className="text">{attributes.title}</span>
					<div className="openclose plus"></div>
				</div>
				<RichText.Content
					tagName="p"
					className="answer"
					value={attributes.content}
				/>
			</div>
		);
	}
});

registerBlockType('safirtema/bgtext', {
	title: 'Safir İkonlu Büyük Açıklama Kutusu',
	description: 'İkonlu, arkaplanlı ve başlıklı bir açıklama kutusu',
	icon: 'analytics',
	category: 'common',
	attributes: {
		icon: { type: 'string', default: 'mouse' },
		title: { type: 'string', default: 'Başlık buraya gelecek' },
		content: { type: 'string', default: 'Açıklama buraya gelecek.' },
		background: { type: 'string', default: 'coffee' },
	},
	edit: (props) => {
		const { attributes, setAttributes } = props;
		return (
			<div className="safirGutenbergBlockContainer">
				<InspectorControls>
					<PanelBody>
						<PanelRow>
							<TextControl
								label="Başlık metni"
								value={attributes.title}
								onChange={(newval) => setAttributes({ title: newval })}
							/>
						</PanelRow>
					</PanelBody>
					<PanelBody>
						<PanelRow>
							<TextareaControl
								label="Açıklama metni"
								value={attributes.content}
								onChange={(newval) => setAttributes({ content: newval })}
							/>
						</PanelRow>
					</PanelBody>
					<PanelBody>
						<PanelRow>
							<SelectControl
								label="Arkaplan seçimi"
								options={ [
									{ value: null, label: 'Arkaplan seçin', disabled: true },
									{ value: "coffee", label: "Kahve" },
									{ value: "desk", label: "Masa" },
								  	{ value: "environment", label: "Çevre" },
								  	{ value: "flowers", label: "Çiçek" },
								  	{ value: "notes", label: "Not Kağıdı" },
								  	{ value: "question", label: "Soru İşareti" },
								  	{ value: "railways", label: "Demiryolu" },
								  	{ value: "buildings", label: "Bina" },
								  	{ value: "sky", label: "Gökyüzü" },
								] }
								value={attributes.background}
								onChange={(newval) => setAttributes({ background: newval })}
							/>
						</PanelRow>
					</PanelBody>
					<PanelBody>
						<div>
							<p>İkon seçimi</p>
							<div className="safirGutenbergIcons">
								{
									safirIcons.map((icon, i) =>
										<div onClick={ function() { setAttributes({ icon: icon })}} className="icon safiricon">
											<div className="inner">
											<svg className={"safiricon-" + icon}>
												<use href={"#safiricon-" + icon}></use>
											</svg>
											</div>
										</div>
									)
								}
							</div>
						</div>
					</PanelBody>
				</InspectorControls>
				<div className={'descriptionbox ' + attributes.background}>
					<div className="inner">
						<div className={"icon safiricon"}>
							<svg className={"safiricon-" + attributes.icon}>
								<use href={"#safiricon-" + attributes.icon}></use>
							</svg>
						</div>
						<div className="header">{attributes.title}</div>
						<div className="content">{attributes.content}</div>
					</div>
				</div>
			</div>
		);
	},
	save: (props) => {
		const { attributes } = props;
		return (
			<div className={'descriptionbox ' + attributes.background}>
				<div className="inner">
					<div className={"icon safiricon"}>
						<svg className={"safiricon-" + attributes.icon}>
							<use href={"#safiricon-" + attributes.icon}></use>
						</svg>
					</div>
					<div className="header">{attributes.title}</div>
					<div className="content">{attributes.content}</div>
				</div>
			</div>
		);
	}
});


const { addFilter } = wp.hooks;
const filterBlocks = (settings) => {
    
    if (settings.name !== 'core/list') {
        return settings
    }

    const newSettings = {
        ...settings,
        attributes: {
            ...settings.attributes, // spread in old attributes so we don't lose them!
            ozelliste: {
                type: 'boolen',
                default: false
            },
            sutun: {
                type: 'string',
                default: '2'
            }
        },
        edit(props) {
			const { attributes, setAttributes } = props;
            return (
				<div className="safirGutenbergBlockContainer">
					<InspectorControls>
						<PanelBody title="Safir Özel Liste">
							<PanelRow>
								<ToggleControl
									label="Özel Liste biçimini kullan"
									checked={attributes.ozelliste}
									onChange={(newval) => setAttributes({ ozelliste: newval })}
								/>
							</PanelRow>
							<PanelRow>
								<SelectControl
									label="Sütun sayısı"
									options={ [
										{ value: '1', label: 'Tek sütun' },
										{ value: '2', label: '2 sütun' },
										{ value: '3', label: '3 sütun' },
										{ value: '4', label: '4 sütun' },
									] }
									value={attributes.sutun}
									onChange={(newval) => setAttributes({ sutun: newval })}
								/>
							</PanelRow>
						</PanelBody>
					</InspectorControls>
                    <div className={attributes.ozelliste ? 'safir-list' : ''}
                    	data-col={attributes.sutun}>
                        {settings.edit(props)}
                    </div>
                </div>
            )

        },
        save(props) {
            return (
				<div className={props.attributes.ozelliste ? 'safir-list' : ''} data-col={props.attributes.sutun}>
                    {settings.save(props)}
                </div>
            )
        }
    }

    return newSettings;
}

addFilter(
    'blocks.registerBlockType',
    'example/filter-blocks',
    filterBlocks
)